<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthToUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->json('favik_token')->nullable()->after('password');
      $table->boolean('admin')->default(false)->after('password');
      $table->string('avatar')->nullable()->after('password');
      
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('avatar');
      $table->dropColumn('admin');
      $table->dropColumn('favik_token');
    });
  }
}