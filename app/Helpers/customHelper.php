<?php

use App\Models\Admin\DirectBonus;
use App\Models\Admin\Transaction;
use App\Models\User;
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
    return $transaction;
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
