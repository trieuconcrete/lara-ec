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
        Schema::table('orders', function (Blueprint $table) {
            $table->float('total_price')->nullable()->default(rand(10000,200000))->after('payment_id');
            $table->dateTime('order_date')->nullable()->default(now())->after('payment_id');
            $table->renameColumn('status_message', 'status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['total_price', 'order_date']);
            $table->renameColumn('status', 'status_message');
        });
    }
};
