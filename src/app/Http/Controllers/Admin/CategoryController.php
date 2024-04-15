<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Classification;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function create(Category $categories, Classification $classifications)
    {
        return view('admin.categories.create', compact('categories', 'classifications'));
    }

    public function store(CategoryStoreRequest $request)
    {
        DB::beginTransaction();
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'カテゴリの作成が完了しました。');
    }

    public function edit($id, Category $categories, Classification $classifications)
    {
        $category = $categories->getCategory($id);
        return view('admin.categories.edit', compact('category', 'classifications'));
    }

    public function update($id, CategoryUpdateRequest $request, Category $categories)
    {
        $category = $categories->getCategory($id);
        DB::beginTransaction();
        $category->update([
            'name' => $request->name,
            'classification_id' => $request->classification_id
        ]);
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'カテゴリの更新が完了しました。');
    }

    public function destroy($id, Category $categories)
    {
        $category = $categories->getCategory($id);
        DB::beginTransaction();
        $category->delete();
        DB::commit();

        return redirect()->route('admin.dashboard')->with('message', 'カテゴリの削除が完了しました。');
    }
}
