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
    Schema::create('ads', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('image');
        $table->decimal('amount', 10, 2);
        $table->string('link')->nullable();
        $table->date('start_date');
        $table->date('end_date');
        $table->timestamps();
    });
}
};
