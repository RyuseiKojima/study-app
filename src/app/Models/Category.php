<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function classification()
    {
        return $this->belongsto('App\Models\Classification');
    }

    public function clips()
    {
        return $this->belongsToMany('App\Models\Clip');
    }

    // 1つのカテゴリ情報を取得
    public function getCategory($category_id)
    {
        $category = $this->where('id', $category_id)->first();
        return $category;
    }

    // カテゴリに属するクリップidを配列で取得
    public function getCategories($id)
    {
        // カテゴリのクリップ情報を取得
        $clips =  $this::find($id)->clips;

        $getCategories = [];
        // いいね情報からクリップIDを抽出し、配列に格納
        foreach ($clips as $clip) {
            array_push($getCategories, $clip->pivot->clip_id);
        }
        return $getCategories;
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
}
