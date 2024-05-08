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
        Schema::create('promotion_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Promotion_id')->unsigned();
            $table->foreign('Promotion_id')->references('id')->on('promotions')->onDelete('cascade');
            $table->enum('promotion_type', ['wholesale', 'products', 'customers', 'branch']);
            $table->text('logic');
            $table->bigInteger('additional_conditions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_details');
    }
};
