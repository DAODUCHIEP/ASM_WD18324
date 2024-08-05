@extends('users.layouts.navigation')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <!-- Search and Category Filter Form -->
            <form method="GET" action="{{ route('users.listUsers') }}" class="mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <select name="category_id" class="form-select" onchange="this.form.submit()">
                            <option value="">Tất cả danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm..."
                            value="{{ request('search') }}" />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>

            <!-- Product Grid -->
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if ($products->count() > 0)
                    <!-- Loop through products -->
                    @foreach ($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ asset($product->image) }}" alt="Product Image"
                                    width="270" height="200" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                                        <!-- Product price-->
                                        <span>{{ number_format($product->price, 0, ',', '.') }} đ</span><br>
                                        <!-- Product category-->
                                        <small>{{ $product->category->name }}</small>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Không có sản phẩm nào phù hợp với tìm kiếm của bạn.
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection
