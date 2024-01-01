<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadmintonFieldHasBallTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badminton_field_has_ball_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId("badminton_field_id")
                ->nullable()
                ->constrained("badminton_fields", "id")
                ->onUpdate("cascade")
                ->onDelete('cascade');
            $table->foreignId("ball_type_id")
                ->nullable()
                ->constrained("ball_types", "id")
                ->onUpdate("cascade")
                ->onDelete('cascade');
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
        Schema::dropIfExists('badminton_field_has_ball_types');
    }
}
