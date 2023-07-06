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
        Schema::create('user_laptops', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('brand_name');
            $table->decimal('price');
            $table->text('description')->nullable();
            $table->timestamp('expiry_dt')->nullable();
            $table->boolean('is_working')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_laptops');
    }
};
