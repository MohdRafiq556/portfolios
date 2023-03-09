<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('author');
            $table->string('links');
            $table->text('details')->nullable();
            $table->text('intro');
            $table->string('slug');
            $table->string('thumbnail')->nullable();
            $table->text('feature')->nullable();
            $table->text('framework')->nullable();
            $table->text('language')->nullable();
            $table->text('styling')->nullable();
            $table->text('others')->nullable();
            //$table->foreignId('project_image_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
};
