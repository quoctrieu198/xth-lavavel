@extends('admin.layout.master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('style-libs')
    <link href="{{asset('theme/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('script-libs')
    <script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>
    <script src="{{asset('theme/admin/js/create-product.init.js')}}"></script>
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Cập nhật sản phẩm</h1>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="true" aria-controls="collapseProductInfo">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm chính</h6>
                        </a>
                        <div class="collapse show" id="collapseProductInfo">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="product-title-input" class="form-label">Tên</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="mb-3">
                                    <label for="product-price-input" class="form-label">Giá</label>
                                    <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="mb-3">
                                    <label for="product-price-sale-input" class="form-label">Giá Sale</label>
                                    <input type="text" class="form-control" name="price_sale" value="{{ $product->price_sale }}" placeholder="Nhập giá sale">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả sản phẩm</label>
                                    <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <a href="#collapseProductImage" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="true" aria-controls="collapseProductImage">
                            <h6 class="m-0 font-weight-bold text-primary">Hình ảnh sản phẩm</h6>
                        </a>
                        <div class="collapse show" id="collapseProductImage">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5 class="fs-14 mb-1">Hình ảnh chính sản phẩm</h5>
                                    <p class="text-muted">Thêm hình ảnh chính cho sản phẩm.</p>
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute top-100 start-100 translate-middle">
                                                <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Chọn hình ảnh">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="fa-solid fa-upload"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input class="form-control d-none" name="img_thumb" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="{{ Storage::url($product->img_thumb) }}" id="product-img" class="avatar-md h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="fs-14 mb-1">Hình ảnh thư viện sản phẩm</h5>
                                    <p class="text-muted">Thêm hình ảnh vào thư viện sản phẩm.</p>
                                    <input type="file" name="product_galleries[]" multiple class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <a href="#collapseProductVariants" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="true" aria-controls="collapseProductVariants">
                            <h6 class="m-0 font-weight-bold text-primary">Biến thể sản phẩm</h6>
                        </a>
                        <div class="collapse show" id="collapseProductVariants">
                            <div class="card-body">
                                <div class="mb-4">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Màu</th>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody id="variants">
                                        @foreach($product->variants as $variant)
                                            <tr class="variant-row">
                                                <td>
                                                    <select name="product_variants[{{ $loop->index }}][size]" class="form-control">
                                                        @foreach($sizes as $size_id => $size_name)
                                                            <option value="{{ $size_id }}" {{ $variant->product_size_id == $size_id ? 'selected' : '' }}>{{ $size_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="product_variants[{{ $loop->index }}][color]" class="form-control">
                                                        @foreach($colors as $color_id => $color_name)
                                                            <option value="{{ $color_id }}" {{ $variant->product_color_id == $color_id ? 'selected' : '' }}>{{ $color_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="file" name="product_variants[{{ $loop->index }}][image]" class="form-control">
                                                    @if($variant->image)
                                                        <img src="{{ Storage::url($variant->image) }}" width="50" alt="Hình ảnh biến thể">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="number" name="product_variants[{{ $loop->index }}][quantity]" class="form-control" value="{{ $variant->quantity }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="remove-variant btn btn-danger">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button type="button" id="add-variant" class="btn btn-primary">Thêm Biến Thể</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Cập nhật</button>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <a href="#collapseStatus" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="true" aria-controls="collapseStatus">
                            <h6 class="m-0 font-weight-bold text-primary">Trạng thái sản phẩm</h6>
                        </a>
                        <div class="collapse show" id="collapseStatus">
                            <div class="card-body">
                                <label for="choices-category-input" class="form-label">Danh mục sản phẩm</label>
                                <select class="form-control" aria-label="Default select example" id="choices-category-input" name="category_id">
                                    @foreach($categories as $id => $name)
                                        <option value="{{ $id }}" {{ $product->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                <select class="form-control form-select-lg mb-3" id="choices-publish-status-input" aria-label="Default select example" name="is_active">
                                    <option value="1" {{ $product->is_active == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="2" {{ $product->is_active == 2 ? 'selected' : '' }}>Không hoạt động</option>
                                </select>
                                <label for="choices-publish-type-input" class="form-label">Loại sản phẩm</label>
                                @php
                                    $types = [
                                        'is_best_sale' => 'Bán chạy',
                                        'is_40_sale' => 'Giảm 40%',
                                        'is_hot_online' => 'Hot online'
                                    ];
                                @endphp
                                <div class="form-group custom-control custom-checkbox small d-flex align-items-center">
                                    @foreach($types as $key => $value)
                                        <div class="col-md-3">
                                            <input type="checkbox" class="custom-control-input" value="{{ $key }}" name="{{ $key }}" id="customCheck-{{ $key }}" {{ $product->$key ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck-{{ $key }}">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <label for="choices-publish-type-input" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let variantIndex = {{ $product->variants->count() }};

            $('#add-variant').click(function() {
                const $lastRow = $('.variant-row').last();
                const $newRow = $lastRow.clone();

                $newRow.find('input, select').each(function() {
                    let name = $(this).attr('name');
                    name = name.replace(/\[\d+\]/, `[${variantIndex}]`);
                    $(this).attr('name', name);
                    $(this).val('');
                });

                $newRow.find('img').remove();

                $newRow.find('.remove-variant').off('click').on('click', function() {
                    $(this).closest('.variant-row').remove();
                });

                variantIndex++;
                $('#variants').append($newRow);
            });

            $('#variants').on('click', '.remove-variant', function() {
                $(this).closest('.variant-row').remove();
            });
        });
    </script>
@endsection
