<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function getCategories()
    {
        return DB::table('categories')
            ->get();
    }

    public function getCategoriesEachClip($clip)
    {
        return DB::table('categories')
            ->join('clips', 'clips.user_id', '=', 'users.id')
            ->get();
    }

    public function classification()
    {
        return $this->belongsto('App\Models\Classification');
    }

    public function clips()
    {
        return $this->belongsToMany('App\Models\Clip');
    }
}
