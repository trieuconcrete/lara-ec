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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code')->nullable();
            $table->string('name_en')->unique();
            $table->string('name_jp_1')->nullable();
            $table->string('name_jp_2')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->tinyInteger('type')->nullable()->default(0)->comment('project type');
            $table->mediumText('notes')->nullable();
            $table->string('image')->nullable();
            $table->string('image_thumb')->nullable();
            $table->integer('estimate_price')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->float('duration')->nullable();
            $table->string('currency')->nullable();

            $table->unsignedBigInteger('manager_id')->nullable()->comment('project manager 1');
            $table->unsignedBigInteger('sub_manager_id')->nullable()->comment('project manager 2');
            $table->unsignedBigInteger('client_id')->nullable();

            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('sub_manager_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
};
