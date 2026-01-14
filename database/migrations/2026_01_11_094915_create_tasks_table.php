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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('solver_id')->constrained('users');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('priority')->nullable();
            $table->string('image')->nullable();
            $table->text('description');
            $table->boolean('send_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
