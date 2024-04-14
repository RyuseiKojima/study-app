<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Clip;
use App\Models\Site;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Classification;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $categories, Classification $classifications)
    {
        $category = $categories->getCategory($id);
        // dd($category);
        return view('admin.categories.edit', compact('category', 'classifications'));

        // return view('admin.categories.edit')->with($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, CategoryUpdateRequest $request, Category $categories)
    {
        $category = $categories->getCategory($id);
        // dd($request->classification_id);
        DB::beginTransaction();
        $category->update([
            'name' => $request->name,
            'classification_id' => $request->classification_id
        ]);
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'カテゴリの更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        $category->delete();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'カテゴリの削除が完了しました。');
    }
}
