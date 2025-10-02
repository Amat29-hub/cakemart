<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chart', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Judul chart
            $table->text('description')->nullable(); // Deskripsi chart
            $table->json('data')->nullable();     // Simpan data dalam bentuk JSON
            $table->enum('status', ['active','nonactive'])->default('active');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('chart');
    }
};
