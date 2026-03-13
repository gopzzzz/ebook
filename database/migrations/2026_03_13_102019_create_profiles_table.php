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
       Schema::create('profiles', function (Blueprint $table) {
    $table->id();
    $table->string('logo')->nullable();
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('facebook_link')->nullable();
    $table->string('youtube_link')->nullable();
    $table->string('insta_link')->nullable();
    $table->string('twitter_link')->nullable();
    $table->text('address');
    $table->string('phone_number');
    $table->string('email');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
