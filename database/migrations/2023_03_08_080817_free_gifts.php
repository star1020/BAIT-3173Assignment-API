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
            $table->string('giftName');
            $table->string('giftDesc');
            $table->string('giftRequiredPrice');
            $table->string('image');
            $table->integer('deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
