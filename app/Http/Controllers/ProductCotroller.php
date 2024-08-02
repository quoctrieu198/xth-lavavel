<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductCotroller extends Controller
{
    //
    public function detail($slug)
    {
        $product = Product::query()->where('slug', $slug)
        ->with(['variants', 'category','galleries'])->first();
        $productVariants = $product->variants->all();
        $colorIds = [];
        $sizeIds = [];
        foreach ($productVariants as $item){
            $colorIds[] = $item->product_color_id;
            $sizeIds[] = $item->product_size_id;
        }
        $colors = ProductColor::query()->whereIn('id', $colorIds)->pluck('name','id')->all();
        $sizes = ProductSize::query()->whereIn('id', $sizeIds)->pluck('name','id')->all();
        $categories = Category::all();
        return view('client.home.show', compact('product', 'colors', 'sizes','categories'));
    }
    public function latestProducts()
    {
        $products = Product::orderBy('created_at', 'desc')->take(5)->get();
        return view('client.home', compact('products'));
    }
    public function index()
    {
        $banners = Banner::limit(2)->get(); // Lấy 2 banner gần nhất
        $categories = Category::all();
        $products = Product::latest('id')->limit(5)->get();
        return view('client.home.index', compact('products', 'categories', 'banners'));
    }
}
