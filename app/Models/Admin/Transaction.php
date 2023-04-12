<?php

namespace App\Models\Admin;

use App\Traits\AutoCreatedUpdated;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'transactions';

    protected $guarded = [];

}
