
@extends('admin.layouts.default')

@section('title')
@parent
Danh sách sản phẩm

@endsection

@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
    <a href="{{route('users.addUser')}}" class="btn btn-primary">Thêm Mới</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key =>$value )
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{ $value->password}}</td>
                <td>{{$value->phone}}</td>

                <td>
                    <a class="btn btn-primary" href="{{route('users.updateUser',$value->id)}}">Sửa</a>
                    <form action="{{route('users.deleteUser',$value->id)}}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn có muốn xóa không?');">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{$listProduct->links('pagination::bootstrap-5')}} --}}
</div>
@endsection
