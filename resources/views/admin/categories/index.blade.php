@extends('admin.layout.master')

@section('title')
    Danh sach danh muc
@endsection

@section('content')
    <a href="{{route('admin.categories.create')}}">
        <button class="btn btn-success">Them moi</button>
    </a>
    @if(session('message'))
        <h4>{{session('message')}}</h4>
    @endif
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </thead>

        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <div style="width: 100px; height: 100px;">
                            <img src="{{Storage::url($item->cover)}}" style="max-width: 100%; max-height: 100%;" alt="">
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
                        <form action="{{route('admin.categories.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" >Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
