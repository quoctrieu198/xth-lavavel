@extends('admin.layout.master')

@section('title')
    Danh sách banner
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.banners.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Tên</label>
                <input type="text" class="form-control"  name="name"></div>
            <div class="mb-3">
                <label  class="form-label" for="formFile">Ảnh</label>
                <input type="file" class="form-control"  id="formFile" name="img_banner">
            </div>
            <div class="mb-3">
                <input type="checkbox" class="btn-check" id="btn-check-outlined" name="is_active"autocomplete="off">
                <label class="btn btn-outline-primary" for="btn-check-outlined">Hoạt động</label><br>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>

@endsection
