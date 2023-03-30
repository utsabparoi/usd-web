<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\App;

trait AutoCreatedUpdatedWithCompany
{
    public static function boot()
    {
        parent::boot();
        if (!App::runningInConsole()) {
            static::creating(function ($model) {
                $model->fill([
                    'created_by' => auth()->id() ?? 1,
                    'updated_by' => auth()->id(),
                    'company_id' => auth()->user()->company->id ?? 1,
                ]);
            });

            static::updating(function ($model) {
                $model->fill([
                    'updated_by' => auth()->id()
                ]);
            });
        }
    }

    public function scopeUserLog($query)
    {
        return $query->with('created_user', 'updated_user');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
