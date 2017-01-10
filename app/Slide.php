<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title',
        'description',
        'description_audio_file_path',
        'is_active',
        'media_content_description',
        'media_content_description_audio_file_path',
        'media_content_image_file_path',
        'media_content_youtube_video',
        'lesson_id'
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
}
