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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('specialist_id')->constrained('specialists');
            $table->foreignId('service_id')->constrained('services');
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['completed', 'cancelled','adopted'])->default('adopted');
            $table->unique(['specialist_id','service_id','date','time']);
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
        Schema::dropIfExists('_records');
    }
};
