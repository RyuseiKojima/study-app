<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // 秘匿性の高い属性に付与してJSONに含まれなくなる
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clips()
    {
        return $this->hasMany('App\Models\Clip');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\Clip', 'likes');
    }

    // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\Models\User', 'relationships', 'followed_user_id', 'following_user_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\Models\User', 'relationships', 'following_user_id', 'followed_user_id');
    }

    public function getYourLikes()
    {
        // ログインユーザのいいね情報を取得
        $likes =  Auth::user()->likes;

        $getYourLikes = [];
        // いいね情報からクリップIDを抽出し、配列に格納
        foreach ($likes as $like) {
            array_push($getYourLikes, $like->pivot->clip_id);
        }

        return $getYourLikes;
    }

    public function getYourFollows()
    {
        // ログインユーザがフォローしたアカウント情報を取得
        $follows =  Auth::user()->follows;
        $getYourFollows = [];
        foreach ($follows as $follow) {
            array_push($getYourFollows, $follow->pivot->followed_user_id);
        }

        return $getYourFollows;
    }
}
