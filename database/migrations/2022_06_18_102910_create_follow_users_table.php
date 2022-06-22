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
        Schema::create('follow_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('followed_user_id');
            $table->unsignedBigInteger('following_user_id');
            $table->timestamps();
            $table
                ->foreign('followed_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->foreign('following_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_users');
    }
};
