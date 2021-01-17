<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first', 50);
            $table->string('last', 50);
            $table->string('gender', 10);
            $table->string('city', 50);
            $table->string('country', 50);
            $table->string('email', 100)->unique();
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('phone', 20);
        });
    }


    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
