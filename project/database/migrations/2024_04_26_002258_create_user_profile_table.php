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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Mã user kiểu int
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Tạo khóa ngoại với bảng users
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sex');
            $table->string('phone');
            $table->string('address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile');
    }
};
