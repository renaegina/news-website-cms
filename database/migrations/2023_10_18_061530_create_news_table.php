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
        // Membuat table
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category', ['health', 'politics', 'technology', 'sports', 'business', 'culinary', 'fashion', 'animals', 'lifestyle', 'entertainment']);
            $table->string('author');
            $table->string('images');
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
        Schema::dropIfExists('news');
    }
};
