<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->text('description')->nullable();
            $table->unsignedInteger('category_id');
            $table->integer('number_of_copies');
            $table->integer('number_of_pages');
            //$table->enum('status', ['approved', 'rejected'])->default('rejected');
            $table->string('cover_image')->nullable();
            $table->string('file_pdf')->nullable();
            $table->foreign('category_id')->references('id')->on('book_categories')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
