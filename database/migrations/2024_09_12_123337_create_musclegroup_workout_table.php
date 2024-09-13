<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('musclegroup_workout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_id');
            $table->unsignedBigInteger('musclegroup_id');
            $table->timestamps();

            // Stel de foreign keys in
            $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
            $table->foreign('musclegroup_id')->references('id')->on('musclegroups')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('musclegroup_workout');
    }
};
