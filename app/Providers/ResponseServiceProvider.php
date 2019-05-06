<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data = [], $status = 200) {
           return response()->json([
               'success'    => true,
               'data'       => $data
           ], $status);
        });

        Response::macro('error', function ($message, $status = 500) {
            return response()->json([
                'success' => false,
                'message' => $message
            ], $status);
        });

        Response::macro('validation_error', function ($fields, $status = 400) {
            return response()->json([
                'success'   => false,
                'message'   => 'invalid Params',
                'fields'    => $fields,
            ], $status);
        });
    }
}
