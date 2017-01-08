<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = ['title', 'description', 'description_audio_file_path', 'isActive'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
