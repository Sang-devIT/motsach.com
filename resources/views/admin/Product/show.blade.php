@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-start pb-0"><h5 class="title-1">Sản phẩm / </h5><h5>Xem chi tiết sản phẩm</h5></div>
    <div class="card-body">
        <div class="row gx-lg-5">
            <div class="col-xl-3 col-md-8 mx-auto">
                <div class="product-img-slider sticky-side-div">
                @foreach ($contact as $item )    
                <img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" style="cursor: zoom-in;" max-width="250px" max-height="250px"></h5><br>
                @endforeach
                    <!-- end swiper nav slide -->
                </div>
                <div class="flex-gallery d-flex justify-content-star flex-wrap">

                    @foreach ($gallery as $item )    
                    <div class="images-gallery">
                        <img src="{{ asset('assets/images/upload/product/'.$item->thumbnail) }}" style="cursor: zoom-in;"  height="90px"></h5><br>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-9">
                <div class="mt-xl-0 mt-5">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                        @foreach ($contact as $item )
                            <h4>{{ $item->name }}</h4>
                            <div class="hstack gap-3 flex-wrap">
                                <div class="text-muted">Mã sản phẩm: <span class="text-body fw-medium">{{ $item->code }}</span></div>
                                <div class="vr"></div>
                                <div class="text-muted">Tác giả: <span class="text-body fw-medium">{{ $author->name }}</span></div>
                                <div class="vr"></div>
                                <div class="text-muted">Ngày tạo: <span class="text-body fw-medium">{{$item->created_at}}</span></div>
                                <div class="vr"></div>
                                <div class="text-muted">Tồn kho: <span class="text-body fw-medium">{{$item->stock}}</span></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex-shrink-0">
                            <div>
                                <a href="{{route('admin.product.edit',$item->slug) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm d-xl-none">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                        <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 d-flex justify-content-start align-items-end">
                                         @foreach ($contact as $item ) 
                                        <p class="text-muted mb-0">Giá:</p>
                                        <h5 class="mb-0">{{ $item->regular_price }} VNĐ</h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm d-xl-none">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                        <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 d-flex justify-content-start align-items-end">
                                         @foreach ($contact as $item ) 
                                        <p class="text-muted mb-0">Trạng thái: </p>
                                        <h5 class="mb-0">{{ $item->status==1?'Kích hoạt':'Chưa kích hoạt'; }}</h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6 d-xl-none">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                            <i class="ri-file-copy-2-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">No. of Orders :</p>
                                        <h5 class="mb-0">2,234</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6 d-xl-none">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                            <i class="ri-stack-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Available Stocks :</p>
                                        <h5 class="mb-0">1,230</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6 d-xl-none">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                            <i class="ri-inbox-archive-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        @foreach ($contact as $item ) 
                                        <p class="text-muted mb-1">Giá :</p>
                                        <h5 class="mb-0">{{ $item->regular_price }}</h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row d-xl-none">
                        <div class="col-xl-6">
                            <div class="mt-4">
                                <h5 class="fs-14">Sizes :</h5>
                                <div class="d-flex flex-wrap gap-2">
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Out of Stock">
                                        <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio1" disabled>
                                        <label class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio1">S</label>
                                    </div>

                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="04 Items Available">
                                        <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio2">
                                        <label class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio2">M</label>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="06 Items Available">
                                        <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio3">
                                        <label class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio3">L</label>
                                    </div>

                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Out of Stock">
                                        <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio4" disabled>
                                        <label class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio4">XL</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class=" mt-4">
                                <h5 class="fs-14">Colors :</h5>
                                <div class="d-flex flex-wrap gap-2">
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Out of Stock">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-primary" disabled>
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="03 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-secondary">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="03 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-success">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="02 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-info">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="01 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-warning">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="04 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-danger">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="03 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-light">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="04 Items Available">
                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-dark">
                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->               
                    <div class="product-content mt-5">
                        <h5 class="fs-14 mb-3">Thông tin sản phẩm :</h5>
                        <nav>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Nội dung</a>
                                </li>
                            </ul>
                        </nav>
                     
                        <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                            @foreach ($contact as $item ) 
                            {{ $item->desc }}
                            @endforeach

                            </div>
                            <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                            @foreach ($contact as $item ) 
                            {{ $item->content }}
                            @endforeach
                            </div>
                        </div>
                   
                    </div>
                    <!-- product-content -->

                    <!-- end card body -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <a href="{{route('admin.product') }}"><button class="btn btn-success btn-sm">Trở về trang sản phẩm </button></a>
    </div>
</div>

@endsection
