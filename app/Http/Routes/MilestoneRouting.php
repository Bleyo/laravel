<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Milestone Web Routes
|--------------------------------------------------------------------------
| Milestone's routes. These routes are loaded by the RouteServiceProvider
|
*/

Route::get('/milestones/{milestone}', function ($user) {
    return $user->email;
});
