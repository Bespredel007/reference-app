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
        Schema::create('specialists', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable(); // Фото спеціаліста
            $table->string('name'); // Ім'я
            $table->string('specialty'); // Спеціальність
            $table->integer('experience'); // Досвід роботи (років)
            $table->string('phone'); // Номер телефону
            $table->integer('price'); // Ціна за тренування
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialists');
    }
};
