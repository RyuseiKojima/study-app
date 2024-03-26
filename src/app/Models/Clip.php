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
        return $this->belongsToMany('App\Models\User', 'likes');
    }

    public function getClipsBuilder()
    {
        $clipsBuilder = $this
            ->with('site')
            ->with('user')
            ->with('categories')
            ->with('likes')
            ->withCount('likes')
            ->orderBy('updated_at', 'desc');

        return $clipsBuilder;
    }

    public function getAllClips()
    {
        $allClips = $this->getClipsBuilder()->get();
        return $allClips;
    }

    public function getYourClips($user_id)
    {
        $yourClips = $this->getClipsBuilder()->where('clips.user_id', $user_id)->get();
        return $yourClips;
    }

    public function getFollowerClips($getYourFollows)
    {
        $followerClips = $this->getClipsBuilder()->whereIn('user_id', $getYourFollows)->get();
        return $followerClips;
    }

    public function getGoodClips($getYourLikes)
    {
        $goodClips = $this->getClipsBuilder()->whereIn('id', $getYourLikes)->get();
        return $goodClips;
    }
}
