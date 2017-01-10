<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['presentation','test']);
            $table->boolean('is_active')->default(false);
            $table->string('title');
            $table->mediumText('description');
            $table->string('description_audio_file_path', 512)->nullable()->default(null);
            $table->string('media_content_description', 512)->nullable()->default(null);
            $table->string('media_content_description_audio_file_path', 512)->nullable()->default(null);
            $table->string('media_content_image_file_path', 512)->nullable()->default(null);
            $table->string('media_content_youtube_video', 512)->nullable()->default(null);
            $table->unsignedInteger('lesson_id')->references('id')->on('lessons');
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
        Schema::dropIfExists('slides');
    }
}
