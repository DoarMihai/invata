<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_paths', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('path_id', false, true);
            $table->foreign('path_id')->references('id')->on('paths');
            $table->bigInteger('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('last_lesson_id', false, true)->nullable();
            $table->foreign('last_lesson_id')->references('id')->on('lessons');
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
        Schema::dropIfExists('enrolled_paths');
    }
};
