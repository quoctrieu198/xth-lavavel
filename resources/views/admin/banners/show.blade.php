@extends('admin.layout.master')

@section('title')
    Danh sách banner
@endsection

@section('content')
    <div class="container mt-4">
        <!-- Danh sách chi tiết -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Thông tin danh mục</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{$banner->id}}</li>
                    <li class="list-group-item"><strong>Tên:</strong> {{$banner->name}}</li>
                    <li class="list-group-item">
                        <strong>Ảnh:</strong>
                        <div style="width: 100px; height: 100px;">
                            <img src="{{Storage::url($banner->img_banner)}}" alt="" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    </li>
                    <li class="list-group-item"><strong>Trạng thái:</strong> {{$banner->is_active ? 'Hoạt động' : 'Không hoạt động'}}</li>
                </ul>
            </div>
        </div>

        <!-- Danh sách thuộc tính -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Danh sách thuộc tính</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($banner->toArray() as $key => $value)
                        <li class="list-group-item"><strong>{{$key}}:</strong> {{$value}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
