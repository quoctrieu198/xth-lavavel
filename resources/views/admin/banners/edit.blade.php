@extends('admin.layout.master')

@section('title')
    Danh sách banner
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.banners.update', $banner)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tên:</label>
                <input type="text" class="form-control" name="name" value="{{$banner->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Ảnh:</label>
                <input type="file" class="form-control" name="img_banner">
                <div style="width: 100px; height: 100px;">
                    <img src="{{Storage::url($banner->img_banner)}}" alt="" width="100" height="100">
                </div>
            </div>
            <div class="mb-3">
                <input type="checkbox" class="btn-check" id="btn-check-outlined" name="is_active" @checked($banner->is_active)>
                <label class="btn btn-outline-primary" for="btn-check-outlined" >Hoạt động </label><br>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
