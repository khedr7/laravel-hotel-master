<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_service_id');
            $table->foreignId('room_id');
            $table->foreignId('reservation_id');
            $table->foreignId('employee_id')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('customer_id');
            $table->timestamp('done_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_sevice_requests');
    }
}
