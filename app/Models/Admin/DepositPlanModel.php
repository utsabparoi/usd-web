<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositPlanModel extends Model
{
    use HasFactory;
    protected $table = 'deposit_plans';
    protected $guarded = [];
}
