@extends('admin.layouts.default')

@section('title')
@parent
Chỉnh sửa sản phẩm

@endsection



@push('styles')



@endpush



@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{route('users.updatePatchUser',$user->id)}}" method="post"
        enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label for="nameSP">Tên User</label>
            <input type="text" name="nameUS" class="form-control" value="{{$user->name}}">
        </div>


        <div class="mb-3">
            <label for="nameSP">Email</label>
            <input type="email" name="emailUS" class="form-control" value="{{$user->email}}">
        </div>

        <div class=" mb-3">
            <label for="nameSP">Password</label>
            <input type="password" name="passwordUS" class="form-control" value="{{$user->password}}">
        </div>

        <div class="mb-3">
            <label for="nameSP">Phone</label>
            <input type="text" name="phoneUS" class="form-control" value="{{$user->phone}}">
        </div>

        <button class=" btn btn-success">Sửa</button>

    </form>

</div>
@endsection



@push('scripts')

@endpush
