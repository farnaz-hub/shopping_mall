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
        Schema::table('users', function (Blueprint $table) {
            $table->string('family');
            $table->bigInteger('mobile');
            $table->enum('gender', ['male', 'female', 'prefer_not_to_say'])->default('male');
            $table->date('birth_date')->nullable();
            $table->bigInteger('national_code')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('job')->nullable();
            $table->string('username');                            // name & password -->had been set before
            $table->double('lat')->nullable();
            $table->double('lan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
