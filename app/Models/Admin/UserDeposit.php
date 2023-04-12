<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeposit extends Model
{
    use HasFactory;
    protected $table = 'user_deposit_plans';
    protected $fillable = ['user_id', 'name', 'package_price', 'deposit_amount',
         'monthly_profit', 'distribute_amount', 'total_installment'];
}
