<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presentations', function (Blueprint $table) {
            $table->dropColumn('media_content_item_id');
            // move media content block inside Presentation Model
            $table->string('media_content_description')->nullable()->default(null);
            $table->string('media_content_description_audio_file_path')->nullable()->default(null);
            $table->string('media_content_image_file_path')->nullable()->default(null);
            $table->string('media_content_youtube_video', 1024)->nullable()->default(null);
            //
            $table->unsignedInteger('category_id')->references('id')->on('categories')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presentations', function (Blueprint $table) {
            //
        });
    }
}
