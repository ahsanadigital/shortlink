<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('links', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('short')->nullable();
      $table->string('url')->nullable();
      $table->string('author')->nullable()->default('anonymous');
      $table->string('ip')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('links');
  }
}
