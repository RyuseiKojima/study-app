<?php

namespace App\Http\Controllers\Admin;

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
        $auth_id = $id;

        return view('admin.categories.show', compact(['clips', 'users', 'categories', 'auth_id', 'id']));
    }
}
