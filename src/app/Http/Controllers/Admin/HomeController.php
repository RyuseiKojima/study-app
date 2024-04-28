<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
// use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Clip;
use App\Models\User;
use App\Models\Site;
use App\Models\Category;
use App\Models\Classification;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Clip $clips, User $users, Site $sites, Category $categories, Classification $classifications)
    {
        $auth_id = Auth::user()->id;
        // プロフィール画面用に用意した変数

        return view('admin.dashboard', compact(['clips', 'users', 'sites', 'categories', 'classifications', 'auth_id']));
    }
}
