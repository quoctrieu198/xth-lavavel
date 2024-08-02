@extends('admin.layout.master')
@section('title')
    Danh sách hóa đơn
@endsection
@section('style-libs')
    <!-- Custom styles for this page -->
    <link href="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('script-libs')
    <script src="{{asset('theme/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('theme/admin/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách hóa đơn</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                        <tr>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Hành Động</th>
                        </tr>
                        </tr>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_email }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->user_phone }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <!-- Thêm các liên kết hoặc nút hành động ở đây -->
{{--                                    <a href="{{ route('order.show', $order->id) }}">Xem</a>--}}
{{--                                    <a href="{{ route('order.edit', $order->id) }}">Chỉnh sửa</a>--}}
{{--                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline;">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" onclick="return confirm('Are you sure?')">Xóa</button>--}}
{{--                                    </form>--}}
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
