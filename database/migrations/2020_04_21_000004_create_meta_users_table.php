<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaUsersTable extends Migration
{
    public function up()
    {
        Schema::create('meta_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('First_name');
            $table->string('Last_name');
            $table->string('Ville')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
