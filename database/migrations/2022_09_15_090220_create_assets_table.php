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

            Schema::create('assets', function (Blueprint $table) {
                $table->id();
                $table->string('asset_name');
                $table->timestamps();
                $table->foreignId('asset_categories_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('asset_details_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
