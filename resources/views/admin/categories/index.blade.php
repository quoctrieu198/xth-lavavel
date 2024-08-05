@extends('admin.layout.master')

@section('title')
Danh sach danh muc
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
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách danh mục</h1>
    @if(session('message'))
        <h4>{{session('message')}}</h4>
    @endif

    <div style="padding-bottom: 10px">
        <a href="{{route('admin.categories.create')}}" style="padding-bottom: 20px">
            <button class="btn btn-success">Thêm mới</button>
        </a>
    </div>
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
                            <th>Tên</th>
                            <th>Ảnh </th>
                            <th>Trạng thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ảnh </th>
                            <th>Trạng thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    <div style="width: 100px; height: 100px;">
                                                        <img src="{{Storage::url($item->cover)}}" style="max-width: 100%; max-height: 100%;"
                                                            alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    {!! $item->is_active ? '<span class="badge bg-success"> Hoạt động </span>' :
                            ' <span class="badge bg-danger"> Không hoạt động </span>'!!}
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.categories.show', $item)}}">
                                                        <button class="btn btn-success">Xem</button>
                                                    </a>
                                                    <a href="{{route('admin.categories.edit', $item)}}">
                                                        <button class="btn btn-warning">Sửa</button>
                                                    </a>
                                                    <form action="{{route('admin.categories.destroy', $item)}}" method="POST"
                                                        onsubmit="return confirmDelete()">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection