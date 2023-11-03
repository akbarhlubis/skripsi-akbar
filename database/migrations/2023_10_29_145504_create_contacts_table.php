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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('instituition')->nullable;
            $table->string('phone')->nullable;
            $table->string('npm')->nullable;
            $table->string('nim')->nullable;
            $table->string('address')->nullable;
            $table->string('city')->nullable;
            $table->string('gender')->nullable;
            $table->string('birthdate')->nullable;
            $table->string('job_title')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
