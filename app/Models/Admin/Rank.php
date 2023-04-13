<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    // protected $fillable =['name','image','target_amount','reward_amount','status'];
    protected $guarded = [];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}



