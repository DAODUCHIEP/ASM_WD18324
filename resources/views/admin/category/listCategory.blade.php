@extends('admin.layouts.default')

@section('title')
@parent
Danh sách Danh Mục

@endsection

@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Danh sách Danh Mục</h4>
    <a href="{{ route('admin.category.addCategory') }}" class="btn btn-primary">Thêm Mới</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">name</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($Category as $key => $value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->name}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{route('admin.category.updateCategory',$value->id)}}">Sửa</a>
                        <form action="{{route('admin.category.deleteCategory',$value->id)}}" method="POST"
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
    {{-- {{$listCategory->links('pagination::bootstrap-5')}} --}}
</div>
@endsection
