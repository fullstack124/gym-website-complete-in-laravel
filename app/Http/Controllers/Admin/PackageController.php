<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function create(Request $request)
    {
        $package = new Package();
        $request->validate([
            'package_name' => 'required',
            'image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'content' => 'required',
        ]);
        $filename = "";
        if ($request->file('image')) {
            $filename = $request->file('image')->store('package', 'public');
        }
        $package->package_name = $request->package_name;
        $package->start = $request->start_date;
        $package->end = $request->end_date;
        $package->description = $request->content;
        $package->image = $filename;
        $result = $package->save();
        if ($result) {
            session()->flash('success', 'Package saved successfully');
            return redirect(route('admin.package'));
        } else {
            session()->flash('error', 'Package saved successfully');
            return redirect(route('admin.package'));
        }
    }


    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.update', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $request->validate([
            'package_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'content' => 'required',
        ]);
        $filename = "";
        if ($request->file('image')) {
            $filename = $request->file('image')->store('package', 'public');
        }
        $package->package_name = $request->package_name;
        $package->start = $request->start_date;
        $package->end = $request->end_date;
        $package->description = $request->content;
        $package->image = $filename;
        $result = $package->save();
        if ($result) {
            session()->flash('success', 'Package Update successfully');
            return redirect(route('admin.package'));
        } else {
            session()->flash('error', 'Package Not Update successfully');
            return redirect(route('admin.edit.package',['id'=>$id]));
        }
    }

    public function delete($id)
    {
        $package = Package::findOrFail($id)->delete();
        if ($package) {
            session()->flash('success', 'Package delete successfully');
            return redirect(route('admin.package'));
        } else {
            session()->flash('error', 'Package Not delete successfully');
            return redirect(route('admin.package'));
        }
    }
}
