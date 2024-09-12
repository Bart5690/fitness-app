<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusclegroupsTable extends Migration
{
    public function up()
    {
        Schema::create('musclegroups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // Kolom voor het bestandspad
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('musclegroups');
    }
}

