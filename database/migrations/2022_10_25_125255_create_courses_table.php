<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->bigInteger('language_id')->unsigned();
            $table->text('image')->nullable();
            $table->integer('price')->default(0);
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
