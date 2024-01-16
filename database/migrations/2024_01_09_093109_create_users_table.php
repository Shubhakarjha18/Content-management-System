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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->mediumText('image')->nullable();
            $table->timestamps();
            $table->longText('description')->nullable();
            $table->string('qualification')->nullable();
            $table->mediumText('skills')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('role',['user','admin'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
