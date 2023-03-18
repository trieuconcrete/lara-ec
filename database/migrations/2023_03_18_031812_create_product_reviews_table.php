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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('email');
            $table->tinyInteger('point')->default(0)->nullable();
            $table->mediumText('comment')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: open, 1: approved, 2: rejected');
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
        Schema::dropIfExists('product_reviews');
    }
};
