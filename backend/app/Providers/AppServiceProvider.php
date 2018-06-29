<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('unique_multiple', function ($attribute, $value, $parameters, $validator)
        {
            $fields = $validator->getData();
            $table = array_shift($parameters);
            $query = DB::table($table);

            foreach ($parameters as $i => $field) {
                $query->where($field, $fields[$field]);
            }
            return ($query->count() == 0);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
