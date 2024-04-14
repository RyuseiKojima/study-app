<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Clip;
use App\Models\User;
use App\Models\Site;
use App\Models\Category;
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

    public function index(Clip $clips, User $users, Site $sites, Category $category)
    {
        $auth_id = Auth::user()->id;
        // プロフィール画面用に用意した変数
        $id = $auth_id;

        return view('admin.dashboard', compact(['clips', 'users', 'auth_id', 'id']));
    }
}
