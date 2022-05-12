<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->double("price");
            $table->foreignId('user_id')->nullable();
            $table->foreignId('room_id');
            $table->foreignId('offer_id')->nullable();
            $table->double("paid");
            $table->timestamp("started_at");
            $table->timestamp("ended_at")->nullable();
            $table->timestamp("paid_at")->nullable();
            $table->timestamp("canceled_at")->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
