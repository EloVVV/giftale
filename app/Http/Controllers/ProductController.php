<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'description'=>'required|min:10',
            'price'=>'required',
            'image_path'=>'mimes:png,jpeg,jpg',
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator->errors())
                ->withInput($request->all());
        }

        $image_path = null;

        if($request->file('image_path')) {
            $image_path = $request->file('image_path')->store('public/images');
        }

        Product::query()->create([
                'image_path'=>$image_path,
            ] + $validator->validated());

        return redirect()->route('home');
    }
    public function show($id)
    {
        $product = Product::query()->find($id);

        if($product === null) {
            return redirect()->route('home');
        }

        return view('single', [
            'product'=>$product
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:6',
            'description' => 'min:20',
            'price' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();

        if($request->file('image_path')) {
            $data = $request->validate(['image_path'=>'mimes:jpg,jpeg,png']);

            $path = $request->file('image_path')->store('public/images');

            $validated['image_path'] = $path;
        }

        $product->update($validated);

        return redirect()->route('single', $product);

    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('home');
    }

    public function  setStatus($product, $status)
    {
        $product->update(['status' => $status] );
        return redirect()->route('home');
    }



    public function setStatusBlocked(Product $product)
    {
        return $this->setStatus($product, 'blocked');
    }
}
