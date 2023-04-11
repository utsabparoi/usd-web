<?php

use App\Models\User;
use App\Models\Admin\Wallet;
use App\Models\Admin\DirectBonus;
use App\Models\Admin\Transaction;
use Illuminate\Support\Facades\DB;

//status show
function status($status){
    if ($status == 1){
        $status = 'checked';
    }
    else{
        $status = '';
    }
    return $status;
}

//invest transaction
function onTransaction($userId, $amount, $balanceType, $wallet_type_id){
    $user_position = DB::table('positions')->where('status', 1)->where('user_id', $userId)->value('id');
    $balance = DB::table('wallets')->value('balance');

    $transaction = Transaction::insert([
        'user_id'         => $userId,
        'source_type'     => 1,
        'source_id'       => 1,
        'amount'          => $amount,
        'balance_type'    => $balanceType,
        'wallet_type_id'  => $wallet_type_id,
        'position_id'     => $user_position,
        'date'            => now(),
        'is_approved'     => 1,
        'created_at'      => date('Y-m-d'),
        'updated_at'      => date('Y-m-d'),
    ]);

    if ($balanceType == 'in') {
        $wallet = Wallet::insertOrUpdate([
            'user_id'         => $userId,
            'wallet_type_id'  => $wallet_type_id,
            'balance'         => $balance + $amount,
            'created_at'      => date('Y-m-d'),
            'updated_at'      => date('Y-m-d'),
        ]);
    }
    elseif ($balanceType == 'out') {
        $wallet = Wallet::insertOrUpdate([
            'user_id'         => $userId,
            'wallet_type_id'  => $wallet_type_id,
            'balance'         => $balance - $amount,
            'created_at'      => date('Y-m-d'),
            'updated_at'      => date('Y-m-d'),
        ]);
    }

    return compact('transaction','wallet');
}

//current wallet balance
function currentBalance($userId, $walletTypeId){
    $userTransactions = Transaction::where('user_id', $userId)
        ->where('wallet_type_id', $walletTypeId)
        ->get();
    $balance = 0;
    foreach ($userTransactions as $item){
        if ($item->balance_type == 'in'){
            $balance = $balance+$item->amount;
        }
        elseif ($item->balance_type == 'out'){
            $balance = $balance-$item->amount;
        }
        else {
            $balance = 0;
        }
    }

    return $balance;
}

//refer detect
function refer($userId){
    $refer = User::where('id', $userId)->first()->refer_by;
    return $refer;
}

//bonus percentage % detect
//function refesPercentage(){
//    $percentage = DirectBonus::find(1)->first()->percentage;
//    return $percentage;
//}

//generation by commission
function refersCommission($userId, $deposit_amount){
    $refer1 = refer($userId);
    $amount = ((DirectBonus::find(1)->first()->percentage)*$deposit_amount)/100;
    //$generationByRefer = array($refer1);
    onTransaction($refer1, $amount, 'in', '2');
    return $refer1;
}
