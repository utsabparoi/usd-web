<?php

use App\Models\User;
use App\Models\Admin\Wallet;
use App\Models\Admin\DirectBonus;
use App\Models\Admin\Transaction;
use Illuminate\Support\Facades\DB;

//status show
function status($status)
{
    if ($status == 1) {
        $status = 'checked';
    } else {
        $status = '';
    }
    return $status;
}

//invest transaction
function onTransaction($userId, $amount, $balanceType, $wallet_type_id)
{
    $user_position = DB::table('positions')->where('status', 1)->where('user_id', $userId)->value('id');
    $balance = DB::table('wallets')->where('user_id', $userId)->value('balance');
    $user_wallet = Wallet::where([['user_id', $userId],['wallet_type_id', $wallet_type_id]])->get();
    DB::beginTransaction();
    try {
        $transaction = Transaction::insert([
            'user_id'         => $userId,
            'source_type'     => 1,
            'source_id'       => 1,
            'amount'          => $amount,
            'balance_type'    => $balanceType,
            'wallet_type_id'  => $wallet_type_id,
            'position_id'     => 1,
            'date'            => now(),
            'is_approved'     => 1,
            'created_at'      => date('Y-m-d'),
            'updated_at'      => date('Y-m-d'),
        ]);
        if (!isset($user_wallet)) {
            if ($balanceType == 'in') {
                $user_wallet->increment('balance', $amount);
            } elseif ($balanceType == 'out') {
                $user_wallet->decrement('balance', $amount);
            }
        }else {
            Wallet::insert([
                'user_id'         => $userId,
                'wallet_type_id'  => $wallet_type_id,
                'balance'         => $amount,
                'created_at'      => date('Y-m-d'),
                'updated_at'      => date('Y-m-d'),
            ]);
        }
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
    }
    return compact('transaction');
}

//current wallet balance
function currentBalance($userId, $walletTypeId)
{
    $userTransactions = Transaction::where('user_id', $userId)
        ->where('wallet_type_id', $walletTypeId)
        ->get();
    $balance = 0;
    foreach ($userTransactions as $item) {
        if ($item->balance_type == 'in') {
            $balance = $balance + $item->amount;
        } elseif ($item->balance_type == 'out') {
            $balance = $balance - $item->amount;
        } else {
            $balance = 0;
        }
    }

    return $balance;
}

//refer detect
function generations($userId)
{
    $id = $userId;
    //    $i = 0;
    //    $gen = array();
    //    do {
    //        $gen = array_add($gen, $i, $id);
    //        $refer = User::where('id', $id)->first()->refer_by;
    //        $i++;
    //    }
    //    while (User::where('id', $refer)->first()->refer_by->exist());
    $refer = User::where('id', $id)->first()->refer_by;
    return $refer;
}

//bonus percentage % detect
//function refesAmountOfPercentage($deposit_amount){
//    $refer1Amount = ((DirectBonus::find(1)->first()->percentage)*$deposit_amount)/100;
//    $refer2Amount = ((DirectBonus::find(2)->first()->percentage)*$deposit_amount)/100;
//    $refer3Amount = ((DirectBonus::find(3)->first()->percentage)*$deposit_amount)/100;
//    $refer4Amount = ((DirectBonus::find(4)->first()->percentage)*$deposit_amount)/100;
//    $refer5Amount = ((DirectBonus::find(5)->first()->percentage)*$deposit_amount)/100;
//    return $refer1Amount;
//}

//generation by commission
function refersCommission($userId, $deposit_amount)
{
    $refer1 = generations($userId);
    $amount = ((DirectBonus::find(1)->first()->percentage) * $deposit_amount) / 100;
    //$generationByRefer = array($refer1);
    onTransaction($refer1, $amount, 'in', '2');
    return $refer1;
}
