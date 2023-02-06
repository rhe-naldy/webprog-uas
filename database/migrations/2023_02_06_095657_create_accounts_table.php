<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id');
            $table->foreignId('role_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreignId('gender_id');
            $table->foreign('gender_id')->references('gender_id')->on('genders');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('email', 100);
            $table->string('display_picture_link', 100);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
}
