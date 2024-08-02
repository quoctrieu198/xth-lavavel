<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';
    const PATH_UPLOAD = 'products';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with(['category'])->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name','id')->all();
        $sizes = ProductSize::query()->pluck('name','id')->all();
        $colors = ProductColor::query()->pluck('name','id')->all();
        return view(self::PATH_VIEW . __FUNCTION__,compact('categories','sizes','colors') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Debugging: kiểm tra toàn bộ dữ liệu request
//        dd($request->all());
//        dd($data);

        $data = $request->except(['product_variants', 'img_thumb', 'product_galleries']);
        $data['is_best_sale'] = $request->has('is_best_sale') ? 1 : 0;
        $data['is_40_sale'] = $request->has('is_40_sale') ? 1 : 0;
        $data['is_hot_online'] = $request->has('is_hot_online') ? 1 : 0;
        $data['slug'] = Str::slug($data['name'] . '-' . $data['sku']);

        // Xử lý file img_thumb
        if ($request->hasFile('img_thumb')) {
            $data['img_thumb'] = $request->file('img_thumb')->store('products');
        }

        // Xử lý dữ liệu variant
        $listProVariants = $request->input('product_variants', []);
        $dataProVariants = [];
        foreach ($listProVariants as $item) {
            $dataProVariants[] = [
                'product_color_id' => $item['color'] ?? null,
                'product_size_id' => $item['size'] ?? null,
                'image' => !empty($item['image']) ? $item['image']->store('product_variants') : null,
                'quantity' => $item['quantity'] ?? 0,
            ];
        }

        // Xử lý dữ liệu gallery
        $listProGalleries = $request->input('product_galleries', []);
        $dataProGalleries = [];
        foreach ($listProGalleries as $image) {
            if (!empty($image)) {
                $dataProGalleries[] = [
                    'image' => $image->store('product_galleries'),
                ];
            }
        }

        try {
            DB::beginTransaction();

            // Tạo dữ liệu cho bảng product
            $product = Product::query()->create($data);

            // Tạo dữ liệu cho product variant
            foreach ($dataProVariants as $item) {
                // Kiểm tra xem tất cả các trường cần thiết đều có dữ liệu không
                if (isset($item['product_color_id']) && isset($item['product_size_id']) && isset($item['quantity'])) {
                    $item += ['product_id' => $product->id];
                    ProductVariant::query()->create($item);
                }
            }

            // Tạo dữ liệu cho product gallery
            foreach ($dataProGalleries as $item) {
                $item += ['product_id' => $product->id];
                ProductGallery::query()->create($item);
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được tạo thành công.');
        } catch (\Exception $exception) {
            DB::rollBack();
            // Xóa ảnh nếu có lỗi
            // Optional: Xóa ảnh đã upload nếu có lỗi (xem xét trước khi xóa)
            return back()->with('error', 'Có lỗi xảy ra khi tạo sản phẩm: ' . $exception->getMessage());
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__ , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->except(['product_variants', 'img_thumb', 'product_galleries']);
        $data['is_best_sale'] = $request->has('is_best_sale') ? 1 : 0;
        $data['is_40_sale'] = $request->has('is_40_sale') ? 1 : 0;
        $data['is_hot_online'] = $request->has('is_hot_online') ? 1 : 0;
        $data['slug'] = Str::slug($data['name'] . '-' . $data['sku']);

        // Xử lý file img_thumb
        if ($request->hasFile('img_thumb')) {
            // Xóa ảnh cũ nếu có
            if ($product->img_thumb) {
                Storage::delete($product->img_thumb);
            }
            $data['img_thumb'] = $request->file('img_thumb')->store('products');
        }

        // Xử lý dữ liệu variant
        $listProVariants = $request->input('product_variants', []);
        $dataProVariants = [];
        foreach ($listProVariants as $item) {
            $dataProVariants[] = [
                'product_color_id' => $item['color'] ?? null,
                'product_size_id' => $item['size'] ?? null,
                'image' => !empty($item['image']) ? $item['image']->store('product_variants') : null,
                'quantity' => $item['quantity'] ?? 0,
            ];
        }

        // Xử lý dữ liệu gallery
        $listProGalleries = $request->input('product_galleries', []);
        $dataProGalleries = [];
        foreach ($listProGalleries as $image) {
            if (!empty($image)) {
                $dataProGalleries[] = [
                    'image' => $image->store('product_galleries'),
                ];
            }
        }

        try {
            DB::beginTransaction();

            // Cập nhật dữ liệu cho bảng product
            $product->update($data);

            // Xóa các variants cũ và thêm mới
            $product->variants()->delete();
            foreach ($dataProVariants as $item) {
                if (isset($item['product_color_id']) && isset($item['product_size_id']) && isset($item['quantity'])) {
                    $item += ['product_id' => $product->id];
                    ProductVariant::query()->create($item);
                }
            }

            // Xóa các gallery cũ và thêm mới
            $product->galleries()->delete();
            foreach ($dataProGalleries as $item) {
                $item += ['product_id' => $product->id];
                ProductGallery::query()->create($item);
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra khi cập nhật sản phẩm: ' . $exception->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try{
            DB::beginTransaction();
            $product->galleries()->delete();
            //xoa  order
            //xoa variant
            $product->variants()->delete();
            $product->delete();
            // xoa anh trong storage
            DB::commit();
            return redirect()->route('admin.products.index');
        }catch (\Exception $exception){
            DB::rollBack();
            return back();
        }
    }
    // ProductController.php
    // client


}
