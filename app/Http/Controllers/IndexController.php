<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->orderByDesc('created_at')
            ->get();

        return view('index', compact('products'));
    }

    public function reg() {
        return view('reg');
    }

    public function auth() {
        return view('auth');
    }

    public function search(Request $request) {
        $search = $request->search;
        $products = Product::query()->where('name', 'LIKE', "%{$search}%")
            ->orderBy('name')
            ->get();

        return view('index', compact('products'));
    }


    public function order(Product $product) {
//        \route('product.createPost', $product->id
        route('order.createPost', $product);

        $products = Product::query()
            ->orderByDesc('created_at')
            ->get();

        return view('index', compact('products'));
    }

    public function update(Product $product)
    {
        return view('update', [
            'product' => $product
        ]);
    }

    public function blocked()
    {
        return view('blocked');
    }

    public function user(User $user)
    {
        return view('admin', compact('user'));
    }

    public function single()
    {
        return view('single');
    }

    public function add()
    {
        return view('add');
    }
}
