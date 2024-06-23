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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->string('name', 255)->unique();
            $table->string('phone_number', 255)->nullable();
            $table->foreignId('city_id')->constrained();
            $table->string('address', 255)->nullable();
            $table->text('location')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->enum('status', ['pending','processing' ,'resolved', 'rejected'])->default('pending');
            $table->text('resolution')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
