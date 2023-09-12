<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('tranning_type', ['Course', 'Diploma', 'BootCamp']);
            $table->string('number_of_hours');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('degree')->nullable();
            $table->float('price');
            $table->enum('currancy', ['$', 'NIS', 'JOD'])->default('JOD');
            $table->integer('number_of_studants')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['Not Started', 'Inprogress', 'Done'])->default('Not Started');
            $table->string('speciality');
            $table->foreignId('room_id')->nullable();
            $table->foreign('room_id')->on('rooms')->references('id');
            $table->softDeletes();
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
        Schema::dropIfExists('diplomas');
    }
}
