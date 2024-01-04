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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('yelp_id');
            $table->string('alias');
            $table->string('name');
            $table->json('categories');
            $table->json('coordinates');
            $table->json('location');
            $table->string('price');
            $table->boolean('is_closed');
            $table->string('url');
            $table->double('rating');
            $table->string('display_phone');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
