<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(10);
        return view("/brand", compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:100',
            'brand_image' => 'required|mimes:jpg,jpeg,png'
        ], [
            'brand_name.required' => 'Please inputt a brand name',
            'brand_name.max' => 'Brand name must be less than100 characters',
            'brand_image.required' => 'Please uplaod an image',
            'brand_image.mimes' => 'Please upload with an extension of jpg,jpeg,png only'
        ]);

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $img_ext;
        $up_loc = 'image/brand/';
        $filename = $up_loc . $image_name;

        $brand_image->Move($up_loc, $image_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $filename,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back();
    }
}
