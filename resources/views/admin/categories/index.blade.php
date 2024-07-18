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
            <tr>
                <th>ID</th>
                <th>Ten</th>
                <th>Anh</th>
                <th>Trang thai</th>
                <th> Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <div style="width: 100px; height: 100px;">
                            <img src="{{Storage::url($item->cover)}}" alt="" style="width: 100px; height: 100px;">
                        </div>
                    </td>
                    <td>
                        {!! $item->is_active ? '<span class="badge bg-success">Hoat dong </span>' : 'span class="badge bg-danger">Ko Hoat dong </span>' !!}
                    <td>
                    <td>
                        <a href="{{route('admin.categories.show', $item)}}">
                            <button class="btn btn-info">Xem</button>
                        </a>
                        <a href="{{route('admin.categories.edit', $item)}}">
                            <button class="btn btn-success">Sua</button> </a>
                            <form action="{{route('admin.categories.destroy', $item)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Ban co chac muon xoa khong')">Xoa</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
