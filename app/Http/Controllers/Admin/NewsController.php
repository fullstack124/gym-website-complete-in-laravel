<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function add()
    {
        $categorys = Category::latest()->get();
        return view('admin.news.create', compact('categorys'));
    }

    public function store(Request $request)
    {
        $news = new News();
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'date' => 'required',
        ]);
        $filename = "";
        $image = $request->file('image');
        if ($image) {
            $filename = $image->store('news', 'public');
        }
        $news->image = $filename;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->cat_id = $request->category;
        $news->date = $request->date;
        $news->save();
        return redirect(route('admin.new'));
    }

    public function edit($id)
    {
        $categorys = Category::latest()->get();
        $new = News::findOrFail($id);
        return view('admin.news.update', compact(['new', 'categorys']));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'date' => 'required',
        ]);
        $filename = "";
        $image = $request->file('image');
        if ($image) {
            $filename = $image->store('news', 'public');
        } else {
            $filename = $request->old_image;
        }
        $news->image = $filename;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->cat_id = $request->category;
        $news->date = $request->date;
        $news->save();
        return redirect(route('admin.new'));
    }

    public function delete($id)
    {
        $news = News::findOrFail($id)->delete();
        return redirect(route('admin.new'));
    }
}
