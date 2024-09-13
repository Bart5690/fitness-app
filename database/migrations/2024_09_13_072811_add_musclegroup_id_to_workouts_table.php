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
        Schema::table('workouts', function (Blueprint $table) {
            // Voeg de musclegroup_id kolom toe als een foreign key
            $table->unsignedBigInteger('musclegroup_id')->nullable();

            // Stel de foreign key relatie in (als musclegroups primary key 'id' is)
            $table->foreign('musclegroup_id')->references('id')->on('musclegroups')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            // Verwijder de foreign key en kolom bij rollback
            $table->dropForeign(['musclegroup_id']);
            $table->dropColumn('musclegroup_id');
        });
    }
};
