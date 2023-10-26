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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('body');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('embed')->nullable();
            $table->integer('quota')->nullable()->default(0);
            $table->boolean('is_published')->default(false);
            $table->boolean('is_online')->default(false);
            $table->timestamp('published_at')->nullable();
            // start_date and end_date
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
