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
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('sale_off', 'discount');
            $table->unsignedInteger('supplier_id')->nullable()->after('brand_id');
            $table->integer('sku')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->integer('likes')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('discount', 'sale_off');
            $table->dropColumn(['sku', 'supplier_id', 'views', 'likes']);
        });
    }
};
