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
        Schema::create('project_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projects_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('skills_id')->constrained('skills')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_skill');
    }
};
