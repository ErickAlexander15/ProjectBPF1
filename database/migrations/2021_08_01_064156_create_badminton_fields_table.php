<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadmintonFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badminton_fields', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->foreignId("field_type_id")
                ->nullable()
                ->constrained("field_types", "id")
                ->onUpdate("cascade")
                ->onDelete("set null");
            $table->double("price")->nullable()->default(0);
            $table->double("width")->nullable()->default(25);
            $table->double("height")->nullable()->default(16);
            $table->text('img')
                ->nullable();
            $table->enum('is_available', [0, 1])->nullable()->default(1);
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
        Schema::dropIfExists('badminton_fields');
    }
}
