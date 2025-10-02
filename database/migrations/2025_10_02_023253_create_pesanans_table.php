<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->string('noresi')->nullable();
            $table->date('tanggalpesanan')->nullable();
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->enum('status', ['active','nonactive'])->default('active');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
