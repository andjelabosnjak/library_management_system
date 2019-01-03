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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'registered'])->default('registered');
            $table->string('contact_number');
            $table->string('address');
            $table->unsignedInteger('membership_type_id');
            $table->enum('membership_status', ['paid', 'not paid'])->default('not paid');
            $table->integer('fine')->default(0);
            $table->foreign('membership_type_id')->references('id')->on('membership_types')->onDelete('cascade');
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
