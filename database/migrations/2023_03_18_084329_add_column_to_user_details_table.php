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
        Schema::table('user_details', function (Blueprint $table) {
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->nullable()->comment('1: male, 2: female, 3: other');
            $table->tinyInteger('contract_type')->nullable();
            $table->integer('position_id')->nullable();
            $table->integer('branch_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn(['birthday', 'gender', 'contract_type', 'position_id', 'branch_id']);
        });
    }
};
