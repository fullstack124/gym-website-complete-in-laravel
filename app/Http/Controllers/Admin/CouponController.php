<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function store(Request $request)
    {
       $coupon = new Coupon();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
        ]);

        $filename = "";
        $image = $request->file('image');
        if ($image) {
            $filename = $image->store('coupons', 'public');
        }
       $coupon->title = $request->title;
       $coupon->code=rand(1000,9999);
       $coupon->start_date = $request->start_date;
       $coupon->end_date = $request->end_date;
       $coupon->content = $request->content;
       $coupon->image = $filename;

       $coupon->save();
        return redirect(route('admin.coupon'));
    }

    public function edit($id)
    {
       $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.update', compact('coupon'));
    }


    public function update(Request $request, $id)
    {
       $coupon = Coupon::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $filename = "";
        $image = $request->file('image');
        if ($image) {
            $filename = $image->store('coupons', 'public');
        } else {
            $filename = $request->old_image;
        }
       $coupon->title = $request->title;
       $coupon->start_date = $request->start_date;
       $coupon->end_date = $request->end_date;
       $coupon->content = $request->content;
       $coupon->image = $filename;

       $coupon->save();
        return redirect(route('admin.coupon'));
    }

    public function delete($id)
    {
       $coupon = Coupon::findOrFail($id)->delete();
        return redirect(route('admin.coupon'));
    }
}
