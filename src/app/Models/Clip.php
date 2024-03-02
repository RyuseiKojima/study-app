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
        'site',
        'category',
        'user_id',
        'memo',
    ];

    public function getOrderBy()
    {
        return DB::table('clips')
            ->join('users', 'clips.user_id', '=', 'users.id')
            ->join('sites', 'clips.site_id', '=', 'sites.id')
            ->join('categories', 'clips.category_id', '=', 'categories.id')
            ->orderBy('clips.updated_at', 'DESC')
            ->get();
    }

    public function yourClips($id)
    {
        return DB::table('clips')
            ->join('users', 'clips.user_id', '=', 'users.id')
            ->join('sites', 'clips.site_id', '=', 'sites.id')
            ->join('categories', 'clips.category_id', '=', 'categories.id')
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

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
