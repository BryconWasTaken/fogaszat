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
        DB::unprepared('CREATE TRIGGER check_appointment_availability
        BEFORE INSERT ON visit
        FOR EACH ROW
        BEGIN
            DECLARE visit_count INT;
            DECLARE treatment_time time;
            DECLARE start_time datetime;
            DECLARE end_time datetime;

            SET treatment_time =( SELECT treatment_length FROM treatment WHERE treatment.id = NEW.suggested_treatment);
            SET start_time = NEW.visit_date;
            SET end_time = DATE_ADD(start_time, INTERVAL TIME_TO_SEC(treatment_time) SECOND);

            SET visit_count = (
                SELECT COUNT(*) FROM visit
                join treatment on visit.suggested_treatment = treatment.id
                WHERE start_time < visit_date + INTERVAL TIME_TO_SEC(treatment.treatment_length) SECOND
                AND end_time > visit_date
            );


        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('drop trigger check_appointment_availability');
    }
};
