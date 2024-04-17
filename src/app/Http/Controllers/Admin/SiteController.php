<?php

namespace App\Http\Controllers\Admin;

use App\Models\Site;
use App\Http\Requests\SiteStoreRequest;
use App\Http\Requests\SiteUpdateRequest;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function create(Site $sites)
    {
        return view('admin.sites.create', compact('sites'));
    }

    public function store(SiteStoreRequest $request)
    {
        DB::beginTransaction();
        $site = new Site();
        $site->fill($request->all());
        $site->save();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'サイトの作成が完了しました。');
    }

    public function edit($id, Site $sites)
    {
        $site = $sites->getSite($id);
        return view('admin.sites.edit', compact('site'));
    }

    public function update($id, SiteUpdateRequest $request, Site $sites)
    {
        $site = $sites->getSite($id);
        DB::beginTransaction();
        $site->update([
            'name' => $request->name,
        ]);
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'サイトの更新が完了しました。');
    }

    public function destroy($id, Site $sites)
    {
        $site = $sites->getSite($id);
        DB::beginTransaction();
        $site->delete();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'サイトの削除が完了しました。');
    }
}
