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


    // public function getAllClips()
    // {
    //     $allClips = $this
    //         ->with('site')
    //         ->with('user')
    //         ->with('categories')
    //         ->withCount('likes')
    //         ->orderBy('updated_at', 'DESC')
    //         ->get()
    //         ->toArray();
    //     return $allClips;
    // }

    public function getAllClipsBuilder()
    {
        $allClipsBuilder = $this
            ->with('site')
            ->with('user')
            ->with('categories')
            ->withCount('likes')
            ->orderBy('updated_at', 'DESC');
        return $allClipsBuilder;
    }

    // public function getYourClips($user)
    // {
    //     // getAllClips()を使用してdbの読み出し回数を減らす
    //     $yourClips = $this
    //         ->with('site')
    //         ->with('user')
    //         ->with('categories')
    //         ->withCount('likes')
    //         ->where('clips.user_id', $user->id)
    //         ->orderBy('updated_at', 'DESC')
    //         ->get();
    //     return $yourClips;
    // }

    // public function getFollowerClips($user)
    // {
    //     $followerClips = $this
    //         ->with('site')
    //         ->with('user')
    //         ->whereIn('user_id', $user->follows()->pluck('followed_user_id'))
    //         ->with('categories')
    //         ->withCount('likes')
    //         ->orderBy('updated_at', 'DESC')
    //         ->get();
    //     // dd($user->follows()->pluck('followed_user_id'));
    //     return $followerClips;
    // }

    // public function getGoodClips($user)
    // {
    //     $goodClips = $this
    //         ->with('site')
    //         ->with('user')
    //         ->with('categories')
    //         ->withCount('likes')
    //         ->whereHas('likes', function ($query) use ($user) {
    //             $query->where('user_id', $user->id);
    //         })
    //         ->orderBy('updated_at', 'DESC')
    //         ->get();
    //     return $goodClips;
    // }
}
