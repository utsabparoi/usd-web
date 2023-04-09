<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    // use HasFactory;
    protected $table = 'wallets';

    protected $guarded=[];

    function user(){
        return $this->belongsTo(User::class);
    }

    function walletType(){
        return $this->belongsTo(WalletType::class);
    }
}
