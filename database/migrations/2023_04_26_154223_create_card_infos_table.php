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
        Schema::create('card_infos', function (Blueprint $table) {
            $table->id();
            $table->string('card_number');
            $table->string('expiration_date');
            $table->string('cardholder_name');
            $table->string('cvv');
            $table->string('payment_method');
            $table->integer('deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_infos');
    }
};
