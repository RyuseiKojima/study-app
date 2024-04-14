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
        'classification_id',
    ];

    public $timestamps = false;

    public function classification()
    {
        return $this->belongsto('App\Models\Classification');
    }

    public function clips()
    {
        return $this->belongsToMany('App\Models\Clip');
    }

    public function getAllCategories()
    {
        $allCategories = $this
            ->with('classification')
            ->with('clips')
            ->withCount('clips')
            ->get();
        return $allCategories;
    }

    // 1つのカテゴリ情報を取得
    public function getCategory($category_id)
    {
        $category = $this->with('classification')->where('id', $category_id)->first();
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
}
