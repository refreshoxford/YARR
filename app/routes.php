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



Route::get('/', function() {
  return View::make('hello');
});

/**
 * Test routes
 */
Route::group(array('prefix' => 'test'), function() {
  $test_url = 'http://www.jpstacey.info/blog/feed';

  Route::get('subs/add', function() use ($test_url) {
    $feed = RssFeed::find($test_url);
    if ($feed) {
      return "Cannot add $test_url: already there!";
    }

    $feed = new RssFeed;
    $feed->url = $test_url;
    $feed->save();

    return "Added $test_url";
  });

  Route::get('subs/del', function() use ($test_url) {
    RssFeed::destroy($test_url);

    return "Destroyed $test_url";
  });
});

