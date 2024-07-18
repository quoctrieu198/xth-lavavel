@extends('admin.layout.master')

@section('title')
    Chi tiet danh muc
@endsection

@section('content')
    <ul>
        <li>ID: {{$category->id}}</li>
        <li>Ten: {{$category->name}}</li>
        <li>Anh:
            <div style="width: 100px; height: 100px;">
                <img src="{{$category->cover}}" alt="" width="100" height="100">
            </div>
        </li>
        <li>Trang thai: {{$category->is_active}}</li>

    </ul>
    <ul>
        @foreach($category->toArray() as $key=> $value)
            <li>{{$key}} : {{$value}}</li>
        @endforeach
    </ul>
@endsection
