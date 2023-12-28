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
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('admin_name')->nullable();
            $table->string('admin_email')->unique();
            $table->string('admin_password');
            $table->string('role')->default('admin');
            $table->string('admin_age')->nullable();
            $table->string('admin_gender')->nullable();
            $table->text('admin_image')->nullable();
            $table->string('admin_skills')->nullable();
            $table->string('admin_qualification')->nullable();
            $table->text('admin_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};
