<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CategoryClip extends Model
{
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'category_clip';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clip_id',
        'category_id',
    ];


    public function getCategoriesEachClip($clip)
    {
        return DB::table('category_clip')
            ->join('clips', 'clip_categories.clip_id', '=', 'clips.id')
            ->join('categories', 'clip_categories.category_id', '=', 'categories.id')
            ->where('clips.id', $clip)
            ->get();
    }
}
