<?php

use App\Models\Admin\DirectBonus;
use App\Models\User;
use App\Models\Admin\Wallet;
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
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
    }

//    $wallet = Wallet::insertOrUpdate([
//        'user_id'         => $userId,
//        'wallet_type_id'  => $wallet_type_id,
//        'balance'         => $amount,
//        'created_at'      => date('Y-m-d'),
//        'updated_at'      => date('Y-m-d'),
//    ]);

    return compact('transaction');
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

//refer detect by generation
function generations($userId){
    $generationCount = DirectBonus::count();
    $refer = User::where('id', $userId)->first()->refer_by;
    $generation[] = $refer;
    $i = 0;
    do {
        $refer = User::where('id', $refer)->first()->refer_by;
        if ($refer == end($generation)){
            break;
        }
        $generation[] = $refer;
        $i++;
    }
    while ($i < $generationCount);
    return $generation;
}

//generation by commission
function refersCommission($userId, $deposit_amount){
    $refer = generations($userId);
    $generationCount = DirectBonus::count();
    for ($i = 1; $i < $generationCount; $i++){
        $amounts[] = ((DirectBonus::find($i)->percentage)*$deposit_amount)/100;
    }
    for ($i = 0; $i<$generationCount; $i++){
        onTransaction($refer[$i], $amounts[$i], 'in', '2');
    }
    return $refer;
}
