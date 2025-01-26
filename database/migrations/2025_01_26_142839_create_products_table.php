<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->boolean('active')->default(true);
            $table->timestamps();
    
            $table->foreign('category_id')->references('id')->on('product_categories');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
