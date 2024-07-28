@extends('admin.layouts.default')

@section('title')
@parent
Chi tiết sản phẩm

@endsection

@push('styles')


@section('content')
<div class="p-4" style="min-height: 800px;">
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">category_id</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td><img src="{{ asset($product->image) }}" alt="" style="width: 100px;"></td>
                <td>{{ $product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{route('admin.product.listProduct')}}" class="btn btn-info mt-3">Quay Lại</a>

</div>
@endsection



@push('scripts')



@endpush