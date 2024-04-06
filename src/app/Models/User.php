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
    public function followed()
    {
        return $this->belongsToMany('App\Models\User', 'relationships', 'followed_user_id', 'following_user_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\Models\User', 'relationships', 'following_user_id', 'followed_user_id');
    }

    public function getYourLikes($id)
    {
        // ログインユーザのいいね情報を取得
        $likes =  $this::find($id)->likes;

        $getYourLikes = [];
        // いいね情報からクリップIDを抽出し、配列に格納
        foreach ($likes as $like) {
            array_push($getYourLikes, $like->pivot->clip_id);
        }
        return $getYourLikes;
    }


    public function getUsersBuilder()
    {
        $usersBuilder = $this
            ->with('clips')
            ->with('likes')
            ->with('followed')
            ->with('follows')
            ->withCount('clips')
            ->withCount('likes')
            ->withCount('followed')
            ->withCount('follows');

        return $usersBuilder;
    }

    public function getUser($user_id)
    {
        $user = $this->getUsersBuilder()->where('id', $user_id)->first();
        return $user;
    }

    public function getYourFollows($id)
    {
        // ログインユーザがフォローしたアカウント情報を取得
        $follows =  $this::find($id)->follows;
        $getYourFollows = [];
        foreach ($follows as $follow) {
            array_push($getYourFollows, $follow->pivot->followed_user_id);
        }
        return $getYourFollows;
    }

    // あるユーザがフォローしているユーザ情報を取得
    public function getFollowsUsers($id)
    {
        $getYourFollows = $this->getYourFollows($id);
        $followsUsers = $this->getUsersBuilder()->whereIn('id', $getYourFollows)->get();
        return $followsUsers;
    }

    // あるユーザがログイン中のユーザにフォローされているかどうかを確認
    public function is_followed_by_auth_user($id)
    {
        $auth_id = Auth::id();
        return in_array($id, $this->getYourFollows($auth_id));
    }

    // あるユーザをフォローしているユーザidを配列で取得
    public function getYourFollowed($id)
    {
        $followed =  $this::find($id)->followed;
        $getYourFollowed = [];
        foreach ($followed as $follow) {
            array_push($getYourFollowed, $follow->pivot->following_user_id);
        }
        return $getYourFollowed;
    }

    // あるユーザをフォローしているユーザ情報を取得
    public function getFollowedUsers($id)
    {
        $getYourFollowed = $this->getYourFollowed($id);
        $followedUsers = $this->getUsersBuilder()->whereIn('id', $getYourFollowed)->get();
        return $followedUsers;
    }
}
