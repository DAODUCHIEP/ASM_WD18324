@extends('admin.layouts.default')

@section('title')
@parent
Thêm mới Danh Mục

@endsection



@push('styles')



@endpush



@section('content')
<div class="p-4" style="min-height: 800px;">
    @if (session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif
    <form action="{{route('admin.category.addPostCategory')}}" method="post" >
        @csrf
        <div class="mb-3">
            <label for="nameSP">Tên Danh Mục</label>
            <input type="text" name="nameCT" class="form-control">
            @error('nameCT')
                <p class="text-danger">{{$message}}</p>
            @enderror <br>
        </div>
        <button class="btn btn-success">Thêm mới</button>

    </form>

</div>
@endsection



@push('scripts')

@endpush
