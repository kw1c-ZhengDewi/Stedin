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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('item_nr')->unique();
            $table->string('item_name')->unique();

            // Add supplier_id as foreign key
            $table->unsignedBigInteger('supplier_id');   // match suppliers.id type
            $table->foreign('supplier_id')               // define FK
                ->references('id')                     // column in suppliers table
                ->on('suppliers')                      // referenced table
                ->onDelete('cascade');                 // optional: delete products if supplier is deleted

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
