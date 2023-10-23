<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('incidences', function (Blueprint $table) {
            $table->string('title');
            $table->text('text');
            $table->integer('estimated_minutes');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('department_id')->constrained('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('incidences', function (Blueprint $table) {
            $table->dropColumn(['title', 'text', 'estimated_minutes', 'category_id', 'owner_id', 'department_id']);
        });
    }
}
