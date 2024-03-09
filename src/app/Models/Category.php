<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function classification()
    {
        return $this->belongsto('App\Models\Classification');
    }

    public function clips()
    {
        return $this->belongsToMany('App\Models\Clip');
    }
}
