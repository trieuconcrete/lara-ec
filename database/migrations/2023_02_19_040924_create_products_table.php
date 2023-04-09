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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->startingValue(10000);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();

            $table->integer('original_price')->nullable()->default(0);
            $table->integer('selling_price')->nullable()->default(0);
            $table->integer('discount')->default(0)->nullable();
            $table->integer('quantity')->nullable()->default(0);
            $table->tinyInteger('trending')->nullable()->default(0)->comment('0=not-trending,1=trending');
            $table->tinyInteger('featured')->default(0)->nullable()->comment('0=not-featured,1=featured');
            $table->tinyInteger('status')->nullable()->default(0)->comment('0=hidden,1=publish');
            $table->string('product_code', 12);
            $table->index(['product_code']);

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();

            $table->integer('sku')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->integer('likes')->nullable()->default(0);

            $table->string('main_image')->nullable(true);
            $table->integer('number_month_brand_warranty')->default(0)->nullable(true);
            $table->integer('number_day_return')->default(0)->nullable(true);
            $table->tinyInteger('is_cash_on_delivery')->default(1)->nullable(true);
            $table->tinyInteger('is_visibility')->default(1)->nullable(true);
            $table->dateTime('published_at')->nullable(true);
            $table->unsignedInteger('product_tag_id')->nullable(true);
            $table->float('rating')->nullable(true);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('products');
    }
};
