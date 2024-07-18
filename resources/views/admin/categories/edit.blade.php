@extends('admin.layout.master')

@section('title')
    sua
@endsection

@section('content')
    <form action="{{route('admin.categories.update', $category)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Ten:</label>
            <input type="text" name="name" value="{{$category->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Anh:</label>
            <input type="file" name="cover">
            <div style="width: 100px; height: 100px;">
                <img src="{{Storage::url($category->cover)}}" alt="" width="100" height="100">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Trang thai:</label>
            <input class="form-check-input" type="checkbox" name="is_active" @checked($category->is_active)>
        </div>
        <button type="submit" class="btn btn-success">Cap nhat</button>
    </form>
@endsection

