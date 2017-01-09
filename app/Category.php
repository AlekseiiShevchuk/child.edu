<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','parent_id'];

    protected $hidden = ['parent_id'];

    public static function getIDsArrayOfParentCategories()
    {
        return DB::table('categories')->where('parent_id','=', null)->pluck('id')->toArray();
    }

    /**
     * Get children categories.
     */
    public function children()
    {
        return $this->hasMany('App\Category','parent_id');
    }

    /**
     * Get parent category.
     */
    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    public function presentations()
    {
        return $this->hasMany('App\Presentations');
    }
}
