<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment')->nullable();
            $table->integer('from_user')->nullable();
            $table->integer('product')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
