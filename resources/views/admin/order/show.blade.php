@extends('admin.layout.master')
@section('title')
Chi tiết hóa đơn
@endsection
@section('style-libs')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection
@section('script-libs')
<script src="{{ asset('theme/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/admin/js/demo/datatables-demo.js') }}"></script>
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1>

    <!-- Print Button -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div id="printable-area" class="table-responsive printable">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID biến thể</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Size</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ID biến thể</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Size</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product_variant_id }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_sku }}</td>
                                <td>
                                    <div style="width: 100px; height: 100px;">
                                        <img src="{{ Storage::url($item->product_img_thumb) }}"
                                            style="max-width: 100%; max-height: 100%;" alt="">
                                    </div>
                                </td>
                                <td>{{ number_format($item->product_price_sale, 2) }}</td>
                                <td>{{ $item->variant_size_name }}</td>
                                <td>{{ $item->variant_color_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>    
                                    <a href="{{ route('admin.order.invoma.print', $order->id) }}" class="btn btn-primary">In hóa đơn</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
