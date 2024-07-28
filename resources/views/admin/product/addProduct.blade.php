@extends('admin.layouts.default')

@section('title')
@parent
Thêm mới sản phẩm

@endsection



@push('styles')



@endpush



@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{route('admin.product.addPostProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nameSP">Tên sản phẩm</label>
            <input type="text" name="nameSP" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imageSP">Ảnh sản phẩm</label>
            <input type="file" name="imageSP" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category: </label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $cate)
                <option {{ old('category_id') == $cate->id ? 'selected' : '' }} value="{{ $cate->id }}">
                    {{ $cate->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nameSP">Giá sản phẩm</label>
            <input type="text" name="priceSP" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nameSP">Mô tả</label>
            <input type="text" name="descriptionSP" class="form-control">
        </div>


        <button class="btn btn-success">Thêm mới</button>

    </form>

</div>
@endsection



@push('scripts')

@endpush