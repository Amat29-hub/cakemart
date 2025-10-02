<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('harga', 12, 2)->default(0);
            $table->string('size')->nullable();
            $table->enum('status', ['active','nonactive'])->default('active');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
