@extends('admin.layouts.default')

@section('title')
@parent
Chỉnh sửa sản phẩm

@endsection



@push('styles')



@endpush



@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{route('admin.category.updatePatchCategory',$category->id)}}" method="post"
        enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label for="nameSP">Tên sản phẩm</label>
            <input type="text" name="nameCT" class="form-control" value="{{$category->name}}">
        </div>
        <button class=" btn btn-success">Sửa</button>

    </form>

</div>
@endsection



@push('scripts')

@endpush
