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
            $table->id()->autoIncrement();
            $table->mediumText('book_description');
            $table->mediumText('book_image');
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
