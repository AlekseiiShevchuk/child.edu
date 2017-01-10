<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'description_audio_file_path',
        'isActive',
        'media_content_description',
        'media_content_description_audio_file_path',
        'media_content_image_file_path',
        'media_content_youtube_video',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
