<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    const PATH_VIEW = 'client.home.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotItems = Product::where('is_hot_online', true)
            ->latest('created_at')
            ->limit(1)
            ->get();
        $banners = Banner::orderBy('created_at', 'desc')->limit(2)->get(); // Lấy 2 banner mới nhất
        $categories = Category::all();
        $products = Product::query()->latest('id')->limit(5)->get();
        return view('client.home.index', compact('products', 'categories', 'banners','hotItems'));
    }
    public function shop()
    {
        $categories = Category::all();
        $products = Product::paginate(12); // Số sản phẩm trên mỗi trang
        return view('client.home.shop', compact('products', 'categories'));
    }

    public function cart()
    {
        $categories = Category::all();
        return view('client.home.cart', compact('categories'));
    }

}
