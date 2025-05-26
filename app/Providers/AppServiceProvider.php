<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\Adres;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();

        Route::bind('adres', function ($value) {
            $adres = Adres::where('id', $value)
                ->where('user_id', auth()->id())
                ->first();

            if (!$adres) {
                throw (new ModelNotFoundException)->setModel(Adres::class);
            }

            return $adres;
        });
    }

}
