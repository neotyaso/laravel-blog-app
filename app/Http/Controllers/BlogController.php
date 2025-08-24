<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("blogs.index", ["blogs"=> $blogs]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //バリデーションでvalidateは指定したルールに従って入力をチェックするメソッドでルールの意味はタイトルが255語まででタイトルとコンテンツは本文が必須になっている
        $validated = $request->validate([
            "title" => "required|max:255",
            "content" => "required",
            ]);

            Blog::create($validated);
            return redirect("/blogs");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail(($id));//idで記事を取得してきて
        return view("blogs.detail", ["blog"=> $blog]); //ディテールのビューに渡す
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);//idで記事を取得
        return view("blogs.edit", ["blog"=> $blog]); //取得した記事をビューに渡す
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //保存と同じでバリデーションを入れる
        $validated = $request->validate([
            "title"=> "required|string|max:255",
            "content"=> "required|string"
            ]);

        //データを更新する
        Blog::findOrFail($id)->update($validated);//データベースのテーブルに行ってそのあと取得したレコードのデータを更新している
        return redirect("/blogs");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect("/blogs");
    }
}
