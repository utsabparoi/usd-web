<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Traits\AutoCreatedUpdated;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'transactions';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function walletType(){
        return $this->belongsTo(WalletType::class);
    }

}
