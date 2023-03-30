<?php

namespace App\Traits;

use App\Models\AdminModel;
use Illuminate\Support\Facades\App;

trait AutoCreatedUpdatedforCustomMiddleware
{

    public static function boot()
    {
        parent::boot();

        if (!App::runningInConsole()) {
            /**
             * Auto create created_by field when create anything through model
             */
            static::creating(function ($model) {
                $model->fill([
                    // 'created_by' => auth()->id(),
                    // 'updated_by' => auth()->id()
                    //for custom AdminLogin MidleWare
                    'created_by' => session('AdminId'),
                    'updated_by' => session('AdminId')

                ]);
            });

            /**
             * Auto update updated_by field when update anything of the model data
             */
            static::updating(function ($model) {
                $model->fill([
                    // 'updated_by' => auth()->id()
                    'updated_by' => session('AdminId')
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
        return $this->belongsTo(AdminModel::class, 'created_by', 'id');
    }

    public function updated_user()
    {
        return $this->belongsTo(AdminModel::class, 'updated_by', 'id');
    }
}
