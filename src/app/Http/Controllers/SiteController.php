<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Clip;
use App\Models\User;
use App\Models\Site;

class SiteController extends Controller
{
    // あるカテゴリの投稿リストを表示
    public function show($id, Clip $clips, User $users, Site $sites): View
    {
        $auth_id = Auth::user()->id;

        return view('sites.show', compact(['clips', 'users', 'sites', 'auth_id', 'id']));
    }
}
