<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','package_price','deposit_amount','monthly_profit','converted_amount','distribut_amount','status'];
}
