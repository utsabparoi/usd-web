<?php
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

//investor account credit
function creditBalance($amount){
    return $amount;
}

//investor wallet: income balance
function walletIncomeBalance($id){
    if (DB::table('transaction_view')->where('wallet_type', '=', 'income')->where('user_id', $id)->exists()){
        $balance = DB::table('transaction_view')->where('wallet_type', '=', 'income')->where('user_id', $id)->first()->balance;
    }
    else{
        $balance = 0;
    }
    return $balance;
}

//investor wallet: invest balance
function walletInvestBalance($id){
    if (DB::table('transaction_view')->where('wallet_type', '=', 'invest')->where('user_id', $id)->exists()){
        $balance = DB::table('transaction_view')->where('wallet_type', '=', 'invest')->where('user_id', $id)->first()->balance;
    }
    else{
        $balance = 0;
    }
    return $balance;
}

//refer commission
function refersCommission($id){
    $refer= \App\Models\User::find($id)->refer_by;
    $percentage = \App\Models\Admin\DirectBonus::find(1)->percentage;
    $amount = \App\Models\Admin\UserDeposit::find($id)->deposit_amount;
    $income = ($percentage/$amount)*100;
    DB::table('transaction_view')->insert([
        'user_id'     => $refer,
        'wallet_type' => 'income',
        'balance'     => $income,
    ]);
    return;
}
