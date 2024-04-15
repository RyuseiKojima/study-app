<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Clip;
use App\Models\Site;
use App\Models\Classification;
use App\Http\Requests\ClipUpdateRequest;
use Illuminate\Support\Facades\DB;

class ClipController extends Controller
{
    public function edit($id, Clip $clips, Site $sites, Classification $classifications)
    {
        $clip = $clips->getClip($id);
        return view('admin.clips.edit', compact('clip', 'sites', 'classifications'));
    }

    public function update($id, ClipUpdateRequest $request, Clip $clips)
    {
        $clip = $clips->getClip($id);

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

    public function destroy($id, Clip $clips)
    {
        $clip = $clips->getClip($id);
        DB::beginTransaction();
        $clip->delete();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'クリップの削除が完了しました。');
    }
}
