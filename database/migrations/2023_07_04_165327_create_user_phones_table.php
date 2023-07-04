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
        Schema::create('user_phones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('brand_name');
            $table->decimal('price');
            $table->text('description')->nullable();
            $table->enum('phone_type', ['samsung', 'apple']);
            $table->timestamp('expiry_dt')->nullable();
            $table->boolean('is_working')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_phones');
    }
};
