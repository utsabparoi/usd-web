<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectBonus extends Model
{
    use HasFactory;
    protected $fillable = ['generation', 'percentage','status'];
}
