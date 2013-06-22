<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before' => 'logged_in', 'do' => function() {
  return Redirect::to('subs');
}));

/*
 * User Routes
 */
Route::controller('user', 'UserController');

/**
 * Subscription handling
 */
Route::filter('logged_in', function() {
  if (Auth::guest()) {
    return Redirect::to('user');
  }
});
Route::controller('subs', 'SubsController');
