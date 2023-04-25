<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('
            CREATE EVENT update_status ON SCHEDULE EVERY 1 SECOND
            DO BEGIN
                UPDATE activities
                SET status = 0
                WHERE CURRENT_TIMESTAMP <= schedule_start AND CURRENT_TIMESTAMP <= schedule_end;

                UPDATE activities
                SET status = 1
                WHERE CURRENT_TIMESTAMP BETWEEN schedule_start AND schedule_end;

                UPDATE activities
                SET status = 2
                WHERE CURRENT_TIMESTAMP >= schedule_start AND CURRENT_TIMESTAMP >= schedule_end;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP EVENT IF EXIST `activity_event_scheduler`');
        // Schema::dropIfExists('activity_event_scheduler');
    }
};
