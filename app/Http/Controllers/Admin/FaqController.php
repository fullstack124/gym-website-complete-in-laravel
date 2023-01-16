<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categorys = Category::latest()->get();
        $faqs = Faq::latest()->get();
        return view('admin.faqs.index', compact(['categorys', 'faqs']));
    }

    public function add()
    {
        $categorys = Category::latest()->get();
        return view('admin.faqs.create', compact(['categorys']));
    }

    public function store(Request $request)
    {
        $faq = new Faq();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $faq->title = $request->title;
        $faq->tags = json_encode($request->tags) ?? 'hello';
        $faq->description = $request->content;
        $faq->cat_id = $request->category;
        $faq->save();
        return redirect(route('admin.faq'));
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $categorys = Category::latest()->get();
        return view('admin.faqs.update', compact(['categorys','faq']));
    }


    public function update(Request $request,$id)
    {
        $faq = Faq::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $faq->title = $request->title;
        $faq->tags = json_encode($request->tags) ?? 'hello';
        $faq->description = $request->content;
        $faq->cat_id = $request->category;
        $faq->save();
        return redirect(route('admin.faq'));
    }

    public function delete($id)
    {
        $faq = Faq::findOrFail($id)->delete();
        return redirect(route('admin.faq'));

    }

}
