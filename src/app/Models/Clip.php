<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Site;


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

    // 1つのカテゴリ情報を取得
    public function getClip($id)
    {
        $clip = $this->getClipsBuilder()->where('id', $id)->first();
        return $clip;
    }

    public function getAllClips()
    {
        $allClips = $this->getClipsBuilder()->get();
        return $allClips;
    }

    public function getYourClips($id)
    {
        $yourClips = $this->getClipsBuilder()->where('clips.user_id', $id)->get();
        return $yourClips;
    }

    public function getFollowerClips($id)
    {
        // ユーザモデルを呼び出し
        $users = new User;
        // フォローしているユーザidを配列で取得
        $getYourFollows = $users->getYourFollows($id);
        // フォローしているユーザのクリップ情報を取得
        $followerClips = $this->getClipsBuilder()->whereIn('user_id', $getYourFollows)->get();
        return $followerClips;
    }

    public function getGoodClips($id)
    {
        // ユーザモデルを呼び出し
        $users = new User;
        // いいねしているクリップidを配列で取得
        $getYourLikes = $users->getYourLikes($id);
        $goodClips = $this->getClipsBuilder()->whereIn('id', $getYourLikes)->get();
        return $goodClips;
    }

    public function getSearchClips($keyword)
    {
        $searchClips = $this->getClipsBuilder()
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orwhere('memo', 'LIKE', "%{$keyword}%")
            ->orwhereHas('site', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->orwhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->orwhereHas('categories', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->get();

        return $searchClips;
    }

    public function getCategoryClips($id)
    {
        // カテゴリモデルを呼び出し
        $categories = new Category;
        // カテゴリに属するクリップidを配列で取得
        $getCategories = $categories->getCategories($id);
        $categoryClips = $this->getClipsBuilder()->whereIn('id', $getCategories)->get();
        return $categoryClips;
    }

    public function getSiteClips($id)
    {
        // サイトモデルを呼び出し
        $sites = new Site;
        // サイトに属するクリップidを配列で取得
        $getSites = $sites->getSites($id);
        $siteClips = $this->getClipsBuilder()->whereIn('id', $getSites)->get();
        return $siteClips;
    }

    // あるクリップがログイン中のユーザにいいねされているかどうかを確認
    public function is_liked_by_auth_user($id)
    {
        $auth_id = Auth::id();
        // ユーザモデルを呼び出し
        $users = new User;
        // いいねしているクリップidを配列で取得
        $getYourLikes = $users->getYourLikes($auth_id);
        return in_array($id, $getYourLikes);
    }
}
