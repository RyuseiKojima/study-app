<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

// use App\Http\Controllers\Admin\Controller;
// use App\Http\Requests\Auth\LoginRequest;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\View\View;

use App\Models\Clip;
use App\Models\User;
use App\Models\Site;
use App\Models\Classification;
use Illuminate\Http\Request;
use App\Http\Requests\ClipStoreRequest;
use App\Http\Requests\ClipUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClipController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clip = Clip::with('categories')
            ->find($id);
        $user = Auth::user();
        $sites = Site::all();
        $classifications = Classification::with('categories')->get();
        return view('admin.clips.edit')->with(['clip' => $clip, 'user' => $user, 'sites' => $sites, 'classifications' => $classifications]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function update(ClipUpdateRequest $request, Clip $clip)
    {
        DB::beginTransaction();
        // クリップテーブルをアップデート
        $clip->update([
            'title' => $request->title,
            'url' => $request->url,
            'site_id' => $request->site_id,
            'memo' => $request->memo
        ]);
        // 中間テーブルをアップデート
        $clip->categories()->sync($request->category_id);
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'クリップの更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clip $clip)
    {
        DB::beginTransaction();
        $clip->delete();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'クリップの削除が完了しました。');
    }
}
