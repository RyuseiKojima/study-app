<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        // $posts = DB::with('tags')->get();
        return DB::table('clips')
            ->categories()
            ->join('users', 'clips.user_id', '=', 'users.id')
            ->join('sites', 'clips.site_id', '=', 'sites.id')
            ->orderBy('clips.updated_at', 'DESC')
            ->get();
    }



    public function yourClips($id)
    {
        return DB::table('clips')
            ->join('users', 'clips.user_id', '=', 'users.id')
            ->join('sites', 'clips.site_id', '=', 'sites.id')
            ->where('user_id', $id)
            ->orderBy('clips.updated_at', 'DESC')
            ->get();
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
}
