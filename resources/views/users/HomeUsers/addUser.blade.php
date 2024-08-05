@extends('admin.layouts.default')

@section('title')
@parent
Thêm mới sản phẩm

@endsection



@push('styles')



@endpush



@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{route('users.addPostUser')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nameSP">Tên User</label>
            <input type="text" name="nameUS" class="form-control">
        </div>

        <div class="mb-3">
            <label for="nameSP">Email</label>
            <input type="email" name="emailUS" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nameSP">Password</label>
            <input type="password" name="passwordUS" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nameSP">Phone</label>
            <input type="number" name="phoneUS" class="form-control">
        </div>
    
        <button class="btn btn-success">Thêm mới</button>

    </form>

</div>
@endsection



@push('scripts')

@endpush
