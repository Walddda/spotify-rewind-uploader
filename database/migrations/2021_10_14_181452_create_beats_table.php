<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('beats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();
            $table->string('tag4')->nullable();
            $table->string('tag5')->nullable();
            $table->text('description')->nullable();
            $table->integer('bpm');
            $table->integer('key_signatures_id');
            $table->integer('price');
            $table->boolean('archive');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beats');
    }
}
