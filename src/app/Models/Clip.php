<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'clips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'url',
        'site_id',
        'user_id',
        'memo',
    ];

    public function getAllClips()
    {
        $allClips = $this
            ->with('site')
            ->with('user')
            ->with('categories')
            ->orderBy('updated_at', 'DESC')
            ->get();
        return $allClips;
    }

    public function getYourClips($user)
    {
        $yourClips = $this
            ->with('site')
            ->with('user')
            ->with('categories')
            ->where('clips.user_id', $user->id)
            ->orderBy('updated_at', 'DESC')
            ->get();
        return $yourClips;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
