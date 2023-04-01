<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $fillable = ['project_name', 'email','phone
    ','address','withdraw_charge','balance_transfer_charge','withdrow_limitation'];
}
