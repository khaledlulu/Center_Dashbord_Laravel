<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->date('date_of_brith');
            $table->enum('currancy', ['USD', 'NIS', 'JOD'])->default('USD');
            $table->enum('salary_type', ['Fixed salary', 'Hourly salary'])->default('Fixed salary');
            $table->string('salary_value');
            $table->string('speciality');
            $table->string('job_title');
            $table->enum('certification', ['Diploma', 'Bachelors', 'Masters', 'PhD', 'Prof', 'Nothing']);
            $table->morphs('actor');
            $table->foreignId('cities_id');
            $table->foreign('cities_id')->on('cities')->references('id');
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
        Schema::dropIfExists('users');
    }
}
