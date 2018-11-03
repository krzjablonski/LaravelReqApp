<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('PESEL')->nullable();
            $table->string('NIP')->nullable();
            $table->longText('address')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('interests')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('experience')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('assessment')->nullable();
            $table->string('cv')->nullable();
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
        Schema::dropIfExists('users');
    }
}
