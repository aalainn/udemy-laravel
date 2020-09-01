<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_category', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
            $table->primary('project_id', 'category_id'); // the primary key is made of project_id and category_id. this prevents double entries of project-category combination
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade'); // is a project gets deleted then this record gets deleted as well
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade'); // is a category gets deleted then this record gets deleted as well
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_category');
    }
}
