<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioTables extends Migration
{
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim', 11);
            $table->string('major');
            $table->string('faculty');
            $table->text('biography');
            $table->string('img_url')->nullable();
            $table->text('slogan')->nullable();
            $table->timestamps();
        });

        Schema::create('certificate', function (Blueprint $table) {
            $table->id('certif_id');
            $table->string('certif_name');
            $table->string('img_url')->nullable();
            $table->text('certif_link')->nullable();
            $table->timestamps();
        });

        Schema::create('owner', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name', 50);
            $table->text('description');
            $table->string('project_url')->nullable();
            $table->timestamps();
        });

        Schema::create('project_img', function (Blueprint $table) {
            $table->id('img_id');
            $table->unsignedBigInteger('project_id');
            $table->string('img_url');
            $table->timestamps();

            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id('skill_id');
            $table->string('skill_name');
            $table->integer('skill_ratio');
            $table->string('img_url')->nullable();
            $table->unsignedBigInteger('personal_id')->nullable();
            $table->integer('experience');
            $table->string('period');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('project_img');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('owner');
        Schema::dropIfExists('certificate');
        Schema::dropIfExists('about');
    }
}