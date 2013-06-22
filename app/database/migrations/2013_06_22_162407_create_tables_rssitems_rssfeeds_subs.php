<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesRssitemsRssfeedsSubs extends Migration {

  /**
   * Create rss_items, rss_feeds, subs
   *
   * @return void
   */
  public function up() {
    Schema::create('rss_feeds', function(Blueprint $table) {
      $table->increments('id');
      // URLs over 4096 aren't handleable by e.g. old libraries
      // and are also MAD
      $table->string('url', 4096);
      // Timestamps
      $table->timestamps();
      // Constraints
      $table->index('url');
    });

    Schema::create('rss_items', function(Blueprint $table) {
      $table->increments('id');
      $table->string('title', 256);
      // GUIDs should be shorter than this; but can sometimes be URLs
      $table->string('guid', 4096);
      $table->string('link', 4096);
      $table->text('description');
      $table->dateTime('pub_date');
      // Timestamps
      $table->timestamps();
    });
    // Have to do constraints afterwards: some sort of confusion with primary
    Schema::table('rss_items', function($table) {
      $table->integer('rss_feed_id')->unsigned();
      $table->foreign('rss_feed_id')->references('id')->on('rss_feeds');
    });

    Schema::create('subs', function(Blueprint $table) {
      $table->increments('id');

      $table->string('title', 256);
      // Timestamps
      $table->timestamps();
    });
    // Have to do constraints afterwards: some sort of confusion with primary
    Schema::table('subs', function($table) {
      $table->integer('rss_feed_id')->unsigned();
      $table->foreign('rss_feed_id')->references('id')->on('rss_feeds');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('subs');
    Schema::drop('rss_items');
    Schema::drop('rss_feeds');
  }
}
