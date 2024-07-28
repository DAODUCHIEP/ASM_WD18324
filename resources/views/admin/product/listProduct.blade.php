@extends('admin.layouts.default')

@section('title')
@parent
Danh sách sản phẩm

@endsection

@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
    <a href="{{ route('admin.product.addProduct')}}" class="btn btn-primary">Thêm Mới</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">category</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listProduct as $key =>$value )
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td><img src="{{ asset($value->image) }}" alt="" style="width: 100px;"></td>
                <td>{{ $value->category->name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->description}}</td>

                <td>
                    <a class="btn btn-primary" href="{{route('admin.product.updateProduct',$value->id)}}">Sửa</a>
                    <form action="{{ route('admin.product.deleteProduct', $value->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this product?');">Xóa</button>

                        <a class="btn btn-info" href="{{route('admin.product.detailProduct',$value->id)}}">Chi tiết sản
                            phẩm</a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$listProduct->links('pagination::bootstrap-5')}}
</div>
@endsection
