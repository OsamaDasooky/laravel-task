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
        Schema::create('book_models', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); //
            $table->mediumText('book_description');
            $table->binary('book_image');
            $table->string('book_author');
            $table->softDeletes();
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
        Schema::table('book_models', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
