<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otps', static function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('code');
            $table->enum('via', ['email', 'phone'])->default('email');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('expired_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
