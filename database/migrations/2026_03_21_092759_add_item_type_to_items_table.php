<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->tinyInteger('item_type')->default(1); // 1 = New, 2 = Second
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('item_type');
    });
}
};
