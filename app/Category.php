<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','parent_id'];
    /**
     * Get children categories.
     */
    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    /**
     * Get parent category.
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function presentations()
    {
        return $this->hasMany('App\Presentations');
    }
}
