<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categorys=Category::latest()->get();
        return view('admin.categorys.index',compact('categorys'));
    }

    public function create(Request $request)
    {
        $category=new Category();
        $request->validate([
            'category_name'=>'required'
        ]);
        $category->category_name=$request->category_name;
        $category->save();
        return redirect(route('admin.category.index'));
    }

    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.categorys.update',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        $request->validate([
            'category_name'=>'required'
        ]);
        $category->category_name=$request->category_name;
        $category->save();
        return redirect(route('admin.category.index'));
    }
    public function delete($id)
    {
        $category=Category::find($id)->delete();
        return redirect(route('admin.category.index'));
    }
}
