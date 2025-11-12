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
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // FK to projects
            $table->unsignedBigInteger('item_id');    // FK to products
            $table->unsignedBigInteger('user_id');    // FK to users
            $table->integer('quantity')->default(1);
            $table->enum('status', ['in_cart', 'in_order', 'approved'])->default('in_cart');
            $table->text('note')->nullable();
            $table->timestamps();


            // Foreign keys
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart');
    }
};
