<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Clip;
use App\Models\User;
use App\Models\Category;

class CategoryController extends Controller
{
    // あるカテゴリの投稿リストを表示
    public function show($id, Clip $clips, User $users, Category $categories): View
    {
        $auth_id = Auth::user()->id;

        return view('categories.show', compact(['clips', 'users', 'categories', 'auth_id', 'id']));
    }
}
