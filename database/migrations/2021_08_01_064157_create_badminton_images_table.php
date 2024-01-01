<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadmintonImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badminton_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('badminton_field_id')
                ->nullable()
                ->constrained('badminton_fields')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('img')->nullable();
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
        Schema::dropIfExists('badminton_images');
    }
}
