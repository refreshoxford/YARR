<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {
  /**
   * Create users table
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function(Blueprint $table) {
      // Fields
      $table->increments('id');
      $table->string('email');
      $table->string('password');
      // Timestamps
      $table->timestamps();
      // Constraints
      $table->unique('email');
    });
  }

  /**
   * Remove users table
   *
   * @return void
   */
  public function down() {
    Schema::drop('users');
  }
}
