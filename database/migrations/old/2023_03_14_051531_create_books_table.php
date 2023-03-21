<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->boolean('series')->default(false);
            $table->string('isbn13',13)->nullable();
            $table->tinyInteger('edition')->nullable();
            $table->boolean('is_fiction')->default(true);
            $table->string('language')->default('en');
            $table->year('published')->nullable();
            $table->string('format')->default('paperback');
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
