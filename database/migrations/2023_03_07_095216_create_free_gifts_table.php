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
        Schema::create('free_gifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gift_name');
            $table->string('gift_desc');
            $table->string('gift_image');
            $table->string('gift_required_price');
            $table->int('deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_gifts');
    }
};
