<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusclegroupWorkoutTable extends Migration
{
    public function up()
    {
        Schema::create('musclegroup_workout', function (Blueprint $table) {
            $table->id();
            $table->foreignId('musclegroup_id')->constrained()->onDelete('cascade');
            $table->foreignId('workout_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('musclegroup_workout');
    }
}
