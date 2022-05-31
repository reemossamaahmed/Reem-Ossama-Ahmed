<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->select('products.*', 'brands.name_en AS Brand_Name_en', 'subcategories.name_en AS Subcategory_Name_en')
            ->get();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $brands = DB::table('brands')
            ->select('id', 'name_en')
            ->get();
        $subcategories = DB::table('subcategories')
            ->select('id', 'name_en')
            ->get();
        return view('admin.products.create', compact('brands', 'subcategories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en'    => ['required', 'string', 'min:2', 'max:32'],
            'name_ar'    => ['required', 'string', 'min:2', 'max:32'],
            'code'       => ['required', 'integer', 'digits:5', 'unique:products,code'],
            'price'      => ['required', 'numeric', 'between:1,99999999.99'],
            'quantity'   => ['nullable', 'integer', 'min:1', 'max:255'],
            'status'     => ['nullable', 'integer', 'in:0,1'],
            'details_en' => ['required', 'string'],
            'details_ar' => ['required', 'string'],
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'image'      => ['required', 'mimes:png,jpg,jpeg', 'max:1000']
        ]);
        $fileName = $request->file('image')->hashName();
        $request->file('image')->move(public_path('dist\img'), $fileName);
        $data = $request->except('_token', 'image');
        $data['image'] = $fileName;
        DB::table('products')->insert($data);
        return redirect()->route('dashboard.products')->with('success', 'data Inserted Successfully..');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_en'    => ['required', 'string', 'min:2', 'max:32'],
            'name_ar'    => ['required', 'string', 'min:2', 'max:32'],
            'code'       => ['required', 'integer', 'digits:5', "unique:products,code,{$id},id"],
            'price'      => ['required', 'numeric', 'between:1,99999999.99'],
            'quantity'   => ['required', 'integer', 'min:1', 'max:255'],
            'status'     => ['required', 'integer', 'in:0,1'],
            'details_en' => ['required', 'string'],
            'details_ar' => ['required', 'string'],
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'image'      => ['nullable', 'mimes:png,jpg,jpeg', 'max:1000']
        ]);
        $data = $request->except('_token', 'image');
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('dist\img'), $fileName);
            $old_image = DB::table('products')->select('image')->where('id', $id)->pluck('image')->first();

            if (file_exists(public_path('dist\img\\' . $old_image))) {
                unlink(public_path('dist\img\\' . $old_image));
            }
            $data['image'] = $fileName;
        }
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('dashboard.products')->with('success', 'data Updated  Successfully..');
    }
    public function edit($id)
    {
        $brands = DB::table('brands')
            ->select('id', 'name_en')
            ->get();
        $subcategories = DB::table('subcategories')
            ->select('id', 'name_en')
            ->get();
        $products = DB::table('products')->where('id', '=', $id)->first();
        return view('admin.products.edit', compact('brands', 'subcategories', 'products'));
    }
    public function delete($id)
    {
        $old_image = DB::table('products')->select('image')->where('id', $id)->pluck('image')->first();
        if (file_exists(public_path('dist\img\\' . $old_image))) {
            unlink(public_path('dist\img\\' . $old_image));
        }
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'data Deleted Successfully..');
    }
}
