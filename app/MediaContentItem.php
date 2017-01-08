<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaContentItem extends Model
{
    public $timestamps = false;

    protected $fillable = ['description', 'description_audio_file_path', 'image_file_path'];
}
