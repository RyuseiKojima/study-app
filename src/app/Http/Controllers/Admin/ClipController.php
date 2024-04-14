<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

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

    // あるキーワードの検索結果を表示
    // public function searchPost(Request $request)
    // {
    //     /* キーワードから検索処理 */
    //     $keyword = $request->input('keyword');

    //     // 入力がなければホーム画面へ戻る
    //     if (empty($keyword)) {
    //         return redirect()->route('dashboard');
    //     } else {
    //         return redirect()->route('search.get', $keyword);
    //     }
    // }

    // あるキーワードの検索結果を表示
    // public function searchGet($keyword, Clip $clips, User $users)
    // {
    //     /* キーワードから検索処理 */
    //     // $keyword = $request->input('keyword');
    //     $auth_id = Auth::user()->id;
    //     // プロフィール画面用に用意した変数
    //     $id = $auth_id;

    //     return view('clips.search', compact(['clips', 'users', 'auth_id', 'id', 'keyword']));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $user = Auth::user();
    //     $sites = Site::all();
    //     $classifications = Classification::with('categories')->get();

    //     return view('clips.create')->with(['user' => $user, 'sites' => $sites, 'classifications' => $classifications]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function store(ClipStoreRequest $request)
    // {
    //     DB::beginTransaction();
    //     // clipを保存
    //     $clip = new Clip();
    //     $clip->fill($request->all());
    //     $clip->save();
    //     // 中間テーブルへの登録
    //     $clip->categories()->sync($request->category_id);
    //     DB::commit();

    //     return redirect()->route('dashboard')->with('message', 'クリップの作成が完了しました。');
    // }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clip $clip
     * @return \Illuminate\Http\Response
     */
    // public function show(Clip $clip)
    // {

    //     $clips = new Clip();
    //     $like_count = $clip->likes->count();

    //     $is_liked_by_auth_user = $clips->is_liked_by_auth_user($clip->id);
    //     return view('clips.show')->with(['clip' => $clip, 'is_liked_by_auth_user' => $is_liked_by_auth_user, 'like_count' => $like_count]);
    // }

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
