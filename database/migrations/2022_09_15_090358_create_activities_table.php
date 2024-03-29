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
            Schema::create('activities', function (Blueprint $table) {
                $table->id();
                $table->string('activity_name');
                $table->string('description')->nullable();
                $table->string('penceramah_name')->nullable();
                $table->string('penceramah_telp')->nullable();
                $table->dateTime('schedule_start');
                $table->dateTime('schedule_end');
                $table->integer('status');
                $table->integer('submission_status')->default(0);
                $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('activity_categories_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('activities');
    }
};
