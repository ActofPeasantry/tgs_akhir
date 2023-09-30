<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santri_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('regist_fee');
            $table->integer('submission_status')->default(0);

            $table->foreignId('santri_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tpq_period_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri_registration');
    }
};
