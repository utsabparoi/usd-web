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

    /*==> update previous status 0 at time to change the postion of a particular user <==*/
    DB::update('update positions set status = ? where user_id = ?', [0, $userId]);

    /*==> call user position function and change position according to target ammount <==*/
    userPosition($userId);

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


/*==> user position create/update <==*/
function userPosition($userId)
{
    // $incomeAmount = Rank::orderBy('target_amount')->pluck('target_amount')->toArray();
    $totalIncome = Transaction::where([['user_id', $userId], ['balance_type', 'in'], ['wallet_type_id', 2]])->sum('amount');

    $currentRank = null;

    $userRank = Rank::query()->where('target_amount', '<=', $totalIncome)->get(['id', 'target_amount'])->toArray();
    sort($userRank);
    if (count($userRank) > 0) {
        $currentRank = collect($userRank)->last();
    }

    /*==> Get Current Position  <==*/
    // $userPositions = Position::where('user_id', $userId)->value('id')->toArray();
    // $currentPositionId = collect($userPositions)->last();
    $currentPosition = null;
    $userPositions = Position::where('user_id', $userId)->get('id')->toArray();

    if (count($userPositions) > 0) {
        $currentPosition = collect($userPositions)->last();
    }
    $currentPositionId = $currentPosition != null ? ($currentPosition['id'] ?? null) : null;

    $userPosition = Position::updateOrCreate(
        [
            'user_id'   => $userId,
            'rank_id'   => $currentRank != null ? ($currentRank['id'] ?? null) : null,
        ],
        [
            'status'    => 1,
        ]
    );

    /*==> Get Changable Position(if happened)  <==*/
    $nextPositionId = Position::where('user_id', $userPosition->$userId)->value('id');

    /*==> User Previous and Next Postion Matching for Tracking Purpose <==*/
    if ($currentPositionId != $nextPositionId) {
        $userRewardAmount = Rank::where('id', $userPosition->rank_id)->value('reward_amount');
        distributeRewardAmount($userPosition->user_id, $userRewardAmount, $nextPositionId->id);
    }
}

/*==> call transection function when a user achived a target <==*/
function distributeRewardAmount($userId, $rewardAmount, $positionId)
{
    Transaction::firstOrCreate([
        'user_id' => $userId,
        'position_id' => $positionId,
    ], [
        'source_type'     => 1,
        'source_id'       => 1,
        'amount'          => $rewardAmount,
        'balance_type'    => 'in',
        'wallet_type_id'  => 2,
        'date'            => now(),
        'is_approved'     => 1,
    ]);
}
