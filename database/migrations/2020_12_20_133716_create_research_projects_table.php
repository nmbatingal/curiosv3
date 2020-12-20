<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_title')->nullable();
            $table->text('keywords')->nullable();
            $table->string('project_category')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->double('budget', 12, 2)->nullable();
            $table->text('more_contents')->nullable();
            $table->string('funding_agency')->nullable();
            $table->json('author')->nullable();
            $table->foreignId('created_by_user_id')->nullable()->index();
            $table->boolean('status_of_completion')->default(false);
            $table->date('project_start')->nullable();
            $table->date('project_end')->nullable();
            $table->text('file_attachment_path')->nullable();
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
        Schema::dropIfExists('research_projects');
    }
}
