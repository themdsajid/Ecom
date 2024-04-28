<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->json('images')->nullable();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->text('description2');
            $table->text('review');
            $table->text('today_offer');
            $table->text('super_deal');
            $table->text('offers');
            $table->enum('status', [0, 1])->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
