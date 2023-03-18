<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
            $table->string('product_code', 12)->default(Str::upper(Str::random(4)).Carbon::now()->format('Ymd'))->after('id');
            $table->tinyInteger('featured')->default(0)->nullable()->comment('0=not-featured,1=featured')->after('trending');
            $table->index(['product_code']);
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
            $table->dropColumn(['featured', 'product_code']);
        });
    }
};
