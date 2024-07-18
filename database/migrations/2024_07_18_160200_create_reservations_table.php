<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->foreignId('table_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->integer('number_of_guests');
            $table->enum('status', ['confirmed', 'pending', 'cancelled'])->default('pending');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
