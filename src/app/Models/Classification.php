<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    // 全ての区分情報を取得
    public function getAllClassifications()
    {
        $allClassifications = $this
            ->with('categories')
            ->withCount('categories')
            ->get();
        return $allClassifications;
    }

    // 1つの区分情報を取得
    public function getClassification($classification_id)
    {
        $classification = $this
            ->where('id', $classification_id)
            ->with('categories')
            ->withCount('categories')
            ->first();
        return $classification;
    }
}
