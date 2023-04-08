<?php

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
        'created_at'     => date('Y-m-d'),
        'updated_at'     => date('Y-m-d'),
    ]);
    return $transaction;
}
