<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    public function getYourLikes($user)
    {
        // ログインユーザのいいね情報を取得
        $likes =  $user->likes;
        $getYourLikes = [];
        // いいね情報からクリップIDを抽出し、配列に格納
        foreach ($likes as $like) {
            array_push($getYourLikes, $like->pivot->clip_id);
        }

        // dd($likes);

        return $getYourLikes;
    }
}
