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

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($clipId)
    {
        return $this->likes()->where('clip_id', $clipId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($clipId)
    {
        if ($this->isLike($clipId)) {
            //もし既に「いいね」していたら何もしない
        } else {
            $this->likes()->attach($clipId);
        }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($clipId)
    {
        if ($this->isLike($clipId)) {
            //もし既に「いいね」していたら消す
            $this->likes()->detach($clipId);
        } else {
        }
    }
}
