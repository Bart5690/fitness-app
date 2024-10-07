<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToWorkoutsTable extends Migration
{
    public function up()
    {
        // Only add the column if it doesn't already exist
        if (!Schema::hasColumn('workouts', 'slug')) {
            Schema::table('workouts', function (Blueprint $table) {
                $table->string('slug')->unique()->after('id');
            });
        }
    }

    public function down()
    {
        // Drop the column if it exists
        if (Schema::hasColumn('workouts', 'slug')) {
            Schema::table('workouts', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
}
