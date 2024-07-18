@extends('admin.layout.master')

@section('title')
    tao danh muc
@endsection

@section('content')
    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Ten:</label>
            <input type="text" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Anh:</label>
            <input type="file" name="cover">
        </div>
        <div class="mb-3">
            <label class="form-label">Trang thai:</label>
            <input class="form-check-input" type="checkbox" name="is_active" checked>
        </div>
        <button type="submit" class="btn btn-success">Tao moi</button>
    </form>
@endsection
