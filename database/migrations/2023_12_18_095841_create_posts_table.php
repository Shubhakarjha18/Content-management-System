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
        Schema::create('posts', function (Blueprint $table) {
         

                $table->unsignedBigInteger('post_id');

                $table->string('post_title');
                $table->unsignedBigInteger('post_category_id');
                $table->text('post_content');
                $table->timestamps(); // This line automatically creates 'created_at' and 'updated_at' columns

                // Define the foreign key constraint
                $table->foreign('post_category_id')->references('cat_id')->on('categories')->onDelete('cascade'); // Change made here
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
