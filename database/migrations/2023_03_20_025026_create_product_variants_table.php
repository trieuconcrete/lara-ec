<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('image_thumb')->nullable();
            $table->mediumText('notes')->nullable();
            $table->jsonb('options')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variants');
    }
};
