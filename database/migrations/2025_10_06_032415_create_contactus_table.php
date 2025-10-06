<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contactus', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('subject');
            $table->text('description');
            $table->boolean('is_seen')->default(false); // status sudah dilihat / belum
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contactus');
    }
};
