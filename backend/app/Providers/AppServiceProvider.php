<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

use DB;

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
        Validator::extend('unique_attendee', function ($attribute, $value, $parameters, $validator)
        {
            $count = DB::table('attendee')->where('meetup_id', $value)
                                          ->where('email', $parameters[0])
                                          ->count();

            return $count === 0;
        });

        Validator::replacer('unique_attendee', function ($message, $attribute, $rule, $parameters) {
            return 'The email and meetup_id field already exists.';
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
