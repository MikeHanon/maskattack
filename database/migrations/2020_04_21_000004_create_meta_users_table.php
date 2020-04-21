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
            $table->integer('user')->nullable();
            $table->string('name');
            $table->string('adresse');
            $table->string('acount_nbr');
            $table->string('phone_number');
            $table->string('paypal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
