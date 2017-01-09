<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description',2000);
            $table->string('description_audio_file_path')->nullable()->default(null);
            $table->unsignedInteger('category_id');
            /*dropped*/$table->unsignedInteger('media_content_item_id')->nullable()->default(null);
            /*dropped*/$table->unsignedInteger('test_id')->nullable()->default(null);
            $table->boolean('isActive')->default(false);
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
        Schema::dropIfExists('presentations');
    }
}
