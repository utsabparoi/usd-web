<?php

use App\Models\User;
use App\Models\Admin\Rank;
use App\Models\Admin\Wallet;
use App\Models\Admin\Position;
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
    $user_position = Position::where('status', 1)->where('user_id', $userId)->value('id');

    $user_wallet = Wallet::where('user_id', $userId)->get();

    DB::beginTransaction();
    try {
        // DB::transaction(function(){});
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

        Wallet::updateOrCreate([
            'user_id'         => $userId,
            'wallet_type_id'  => $wallet_type_id,
        ], [
            'balance'         => currentBalance($userId, $wallet_type_id),
            // 'balance'           => DB::raw("balance + {$amount}")
        ]);

        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
    }
    // userPosition($userId);
    return $transaction;
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
    //return Transaction::where('user_id', $userId)->where('wallet_type_id', $walletTypeId)->where('balance_type', 'in')

    return $balance;
}

//refer detect by generation
function generations($userId)
{
    $generationCount = DirectBonus::count();
    $refer = User::where('id', $userId)->first()->refer_by;
    $generation[] = $refer;
    $i = 0;
    do {
        $refer = User::where('id', $refer)->first()->refer_by;
        if ($refer == end($generation)) {
            break;
        }
        $generation[] = $refer;
        $i++;
    } while ($i < $generationCount);
    return $generation;
}

//generation by commission
function refersCommission($userId, $deposit_amount)
{
    $refer = generations($userId);
    $generationCount = DirectBonus::count();
    $i = 0;
    for ($i = 1; $i < $generationCount; $i++) {
        $amounts[] = ((DirectBonus::find($i)->percentage) * $deposit_amount) / 100;
    }
    $j = 0;
    for ($j = 0; $j < $generationCount; $j++) {
        onTransaction($refer[$j], $amounts[$j], 'in', '2');
    }
    return $refer;
}


//user position insert/update
function userPosition($userId)
{
    $incomeAmount = Rank::orderBy('target_amount')->pluck('target_amount')->toArray();
    $totalIncome = Transaction::where([['user_id',$userId],['balance_type','in'],['wallet_type_id',2]])->sum('amount');
    if ($totalIncome < $incomeAmount[0]) {
        $userRank = null;
    } else {
        for ($i = 0; $i <= sizeof($incomeAmount);) {
            $startRange = $incomeAmount[$i];
            // $endRange = $incomeAmount[++$i];
            if (isset($incomeAmount[++$i])) {
                if (($startRange <= $totalIncome) && ($incomeAmount[$i] > $totalIncome)) {
                    $userRank = Rank::where('target_amount', $incomeAmount[--$i])->value('name');
                }
            } else {
                $userRank = Rank::where('target_amount', $incomeAmount[--$i])->value('name');
            }
        }
    }
    // $existingRank = Position::where([['id', $userId],['rank_id', Rank::where('name', '$userRank')->value('id')]])->value('rank_id');
    // if ($existingRank->isNotEmpty()) {
    //     Position::where([['id', $userId],['rank_id', $existingRank]])->update('status', 0);
    // }

    Position::updateOrCreate(
        [
            'id'    => null,
        ],
        [
            'user_id'   => $userId,
            'rank_id'   => $userRank,
            'status'    => 1,
        ]
    );
}
