@extends('admin.layout.master')
@section('title')
Thêm mới sản phẩm
@endsection
@section('style-libs')
<link href="{{asset('theme/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Plugins css -->
<link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('script-libs')
<!-- ckeditor -->
<script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>

<script src="{{asset('theme/admin/js/create-product.init.js')}}"></script>
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tạo mới sản phẩm</h1>
    <!--  Page main content   -->
    <!--   Main product information             -->
    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!--   left content-->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Main product information -->
                    <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Product main information</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductInfo">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Tên</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter product title">
                            </div>
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Giá</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter product title">
                            </div>
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Giá Sale</label>
                                <input type="text" class="form-control" name="price_sale"
                                    placeholder="Enter product title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô tả sản phẩm</label>
                                <textarea id="ckeditor-classic" name="description" placeholder="Nhập mô tả ">
                                </textarea>

                            </div>

                        </div>
                    </div>
                </div>
                <!--    gallery -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Product Image</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductGallery">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Product Image</h5>
                                <p class="text-muted">Add Product main Image.</p>
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs">
                                                    <div
                                                        class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="fa-solid fa-upload"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <input class="form-control d-none" value="" name="img_thumb"
                                                id="product-image-input" type="file"
                                                accept="image/png, image/gif, image/jpeg">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="" id="product-img" class="avatar-md h-auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="fs-14 mb-1">Product Gallery</h5>
                                <p class="text-muted">Add Product Gallery Images.</p>
                                <input type="file" name="product_galleries[]" multiple class="form-control">
                                {{-- <div class="dropzone">--}}
                                    {{-- <div class="fallback">--}}
                                        {{-- <input name="file" type="file" multiple="multiple">--}}
                                        {{-- </div>--}}
                                    {{-- <div class="dz-message needsclick">--}}
                                        {{-- <div class="mb-3">--}}
                                            {{-- <i class="fa-solid fa-cloud-arrow-up fa-3x"></i>--}}
                                            {{-- </div>--}}

                                        {{-- <h5>Drop files here or click to upload.</h5>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}

                                {{-- <ul class="list-unstyled mb-0" id="dropzone-preview">--}}
                                    {{-- <li class="mt-2" id="dropzone-preview-list">--}}
                                        {{-- <!-- This is used as the file preview template -->--}}
                                        {{-- <div class="border rounded">--}}
                                            {{-- <div class="d-flex p-2">--}}
                                                {{-- <div class="flex-shrink-0 me-3">--}}
                                                    {{-- <div class="avatar-sm bg-light rounded">--}}
                                                        {{-- <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                            src="#" alt="Product-Image" />--}}
                                                        {{-- </div>--}}
                                                    {{-- </div>--}}
                                                {{-- <div class="flex-grow-1">--}}
                                                    {{-- <div class="pt-1">--}}
                                                        {{-- <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>--}}
                                                        {{-- <p class="fs-13 text-muted mb-0" data-dz-size></p>--}}
                                                        {{-- <strong class="error text-danger"
                                                            data-dz-errormessage></strong>--}}
                                                        {{-- </div>--}}
                                                    {{-- </div>--}}
                                                {{-- <div class="flex-shrink-0 ms-3">--}}
                                                    {{-- <button data-dz-remove
                                                        class="btn btn-sm btn-danger">Delete</button>--}}
                                                    {{-- </div>--}}
                                                {{-- </div>--}}
                                            {{-- </div>--}}
                                        {{-- </li>--}}
                                    {{-- </ul>--}}
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                    </div>


                </div>
                {{-- product variant --}}
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Sản pẩm biến thể</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductGallery">
                        <div class="card-body">
                            <div class="mb-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Màu</th>
                                            <th>Image</th>
                                            <th>Số lượng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="variants">
                                        <tr class="variant-row">
                                            <td>
                                                <select name="product_variants[][size]" class="form-control">
                                                    @foreach($sizes as $size_id => $size_name)
                                                        <option value="{{ $size_id }}">{{ $size_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_variants[][color]" class="form-control">
                                                    @foreach($colors as $color_id => $color_name)
                                                        <option value="{{ $color_id }}">{{ $color_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[][image]"
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[][quantity]"
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="remove-variant btn btn-danger">Xóa</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" id="add-variant" class="btn btn-primary">Thêm Biến Thể</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!--                        Button -->
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Submit</button>
                </div>
            </div>
            <!-- end left content    -->
            <!-- right content          -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseStatus" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Product status</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseStatus">
                        <!-- end card body -->
                        <div class="card-body">
                            <label for="choices-category-input" class="form-label">Danh mục sản phẩm</label>
                            <select class="form-control" aria-label="Default select example" id="choices-category-input"
                                name="category_id">
                                #@foreach($categories as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                            <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                            <select class="form-control form-select-lg mb-3" id="choices-publish-status-input"
                                aria-label="Default select example" name="is_active">
                                <option selected>-------Trạng thái------</option>
                                <option value="1">Hoạt động</option>
                                <option value="2">Không hoạt đôộng</option>
                            </select>
                            {{-- loại sản phẩm--}}
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
                                        <input type="checkbox" class="custom-control-input" value="{{$key}}" name="{{$key}}"
                                            id="customCheck-{{$key}}">
                                        <label class="custom-control-label" for="customCheck-{{$key}}">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                            {{-- mã sản phẩm--}}
                            <label for="choices-publish-type-input" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="sku" value="{{strtoupper(\Str::random(8))}}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end right content       -->

        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let variantIndex = 1;

        $('#add-variant').click(function () {
            const $lastRow = $('.variant-row').last();
            const $newRow = $lastRow.clone();

            $newRow.find('input, select').each(function () {
                let name = $(this).attr('name');
                name = name.replace(/\[\d*\]/, `[${variantIndex}]`); // Sửa để thay thế chỉ số số nguyên
                $(this).attr('name', name);

                // Đặt lại giá trị của các trường
                if ($(this).attr('type') === 'file') {
                    $(this).val('');
                } else {
                    $(this).val('');
                }
            });

            $newRow.find('.remove-variant').off('click').on('click', function () {
                $(this).closest('.variant-row').remove();
            });

            variantIndex++;
            $('#variants').append($newRow);
        });

        $('#variants').on('click', '.remove-variant', function () {
            $(this).closest('.variant-row').remove();
        });
    });
</script>


<!-- /.container-fluid -->
@endsection