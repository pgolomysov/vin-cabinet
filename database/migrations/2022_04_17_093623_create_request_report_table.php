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
        Schema::dropIfExists('request');
        Schema::dropIfExists('report');

        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char("vin", 17)->nullable();
            $table->char("car_number", 9)->nullable();
            $table->enum('status', [
                'created',
                'in_progress',
                'completed',
                'error'
            ]);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [
                'created',
                'sended_to_queue',
                'parsing_in_progress',
                'creating_report',
                'completed',
                'error'
            ]);
            $table->unsignedBigInteger('request_id');
            $table->json('data');
            $table->enum('source', ['gibdd', 'nomerogram']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
        Schema::dropIfExists('report');
    }
};
