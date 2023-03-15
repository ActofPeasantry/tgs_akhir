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
            Schema::create('balances', function (Blueprint $table) {
                $table->id();
                $table->string('description');
                $table->string('no_invoice')->nullable();
                $table->dateTime('date_received');
                $table->integer('total_amount');
                $table->boolean('debit_credit');
                $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('balance_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('balances');
    }
};
