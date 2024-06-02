<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/detail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .thumbnail-image {
            width: 70px;
            height: 70px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 1px solid gray;
            opacity: 0.5;
            /* Make thumbnails semi-transparent by default */
            transition: opacity 0.3s, border 0.3s;
            /* Add transitions for smooth effect */
        }

        .thumbnail-image.active {
            border: 2px solid red;
            /* Highlight active thumbnail */
            opacity: 1;
            /* Fully opaque active thumbnail */
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px" data-bs-smooth-scroll="true"
    tabindex="0">
    @extends('web.nav')
    @section('navbar')
        <form action="/cart/add" method="post">
            <section class="py-5 product-detail">
                <div class="container mt-5 px-3 px-lg-2 my-1" style="max-height: 700px; overflow:hidden;">
                    <div class="row gx-4 gx-lg-4 align-items-center">
                        <div class="col-md-4" id="mainImageContainer" style="max-width: 900px;">
                            <img id="mainImage" src="{{ asset($product->anhDaiDien) }}" style="width: 100%; height: auto;">
                        </div>
                        {{-- img slider --}}
                        <div class="col-md-2" id="img-slider" style="max-width: 900px;">
                            @php
                                $product_images = explode('*', $product->anhChiTiet);
                            @endphp
                            @foreach ($product_images as $key => $product_image)
                                <img src="{{ asset($product_image) }}"
                                    style="width: 70px; height: 70px; margin-bottom: 10px; border-radius: 10px, border: 1px solid gray;"
                                    onclick="showImage({{ $key }})" class="thumbnail-image"
                                    id="thumbnail-{{ $key }}">
                                <br>
                            @endforeach
                        </div>
                        <div class='col-md-6'>
                            <div class='tenSP'>{{ $product->tenSP }}</div>
                            <!-- <div class='decription'>{{ $product->moTa }}</div> -->
                            <div class='fs-5 mb-5 background align-items-center'>
                                <span
                                    class='text-decoration-line-through giagiam'>{{ number_format($product->giaBan) }}</span>|
                                <span class="giaban">{{ number_format($product->giaGiam) }}</span>
                            </div>
                            <div class='d-flex'>
                                <div class="product-qty">
                                    <input class='form-control text-center me-3' name="product_qty" style='max-width: 4rem' type="number"
                                        value="1" min="1">
                                    <input name="product_id" value="{{ $product->maSP }}" type="hidden">
                                </div>
                                @if ($product->trangthaisps->MaTrangThai == '1')
                                <button href="/shop/cart" type="submit" class='btn btn-outline-dark flex-shrink-0'>
                                    <i class='bi-cart-fill me-1'></i>                                   
                                    Add to cart
                                </button>
                                @elseif ($product->trangthaisps->MaTrangThai == '2')
                                <div>
                                    <p><b>Sản phẩm hết hàng</b></p>
                                </div>
                                @elseif ($product->trangthaisps->MaTrangThai == '3')
                                <div>
                                    <p><b>Sản phẩm ngừng bán</b></p>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @csrf   
        </section>
    </form>
        <!-- Related items section-->
        <section class="bg-light">
            <div class="row detail">
                <div class="col-sm-7">
                    <div class='decription'>{!! $product->moTa !!}</div>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                        style="margin: 20px;">Chi tiết mô tả</button>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ $product->tenSP }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    {!! $product->moTa !!}
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class='decription'>{!! $product->thongSoKyThuat !!}</div>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail"
                        style="margin: 20px;">Thông số kỹ thuật</button>
                    <div class="modal fade" id="detail">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ $product->tenSP }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    {!! $product->thongSoKyThuat !!}
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @forelse ($relatedProducts as $relatedProduct)
                        <div class="col mb-5">
                            <div class="card h-100" style="width: 400px; margin: ">
                                <!-- Product image-->
                                <div class="card">
                                    <img src="{{ asset($relatedProduct->anhDaiDien) }}"
                                        alt="{{ $relatedProduct->tenSP }}" />
                                </div>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center text">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $relatedProduct->tenSP }}</h5>
                                    </div>

                                    <div class="price">
                                        {{ number_format($relatedProduct->giaGiam) }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                            options</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                    cart</a>
                            </div>
                        </div>
                </div>
            </div>
            </div>
            @endforelse
            </div>
        </section>
    @endsection
</body>
<script src="{{ asset('frontend/js/script.js') }}"></script>
<!-- <script>
    function showImage(index) {
        var product_images = @json($product_images);
        var mainImage = document.getElementById('mainImage');
        mainImage.src = product_images[index];
    }
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var product_images = @json($product_images); // Convert PHP array to JavaScript array
        var mainImage = document.getElementById('mainImage');
        var currentIndex = 0;
        var intervalTime = 5000; // Change image every 3000 milliseconds (3 seconds)
        var intervalId;

        function showImage(index) {
            currentIndex = index;
            mainImage.src = product_images[index];
            updateThumbnails();
            resetInterval();
        }

        function showNextImage() {
            currentIndex = (currentIndex + 1) % product_images.length;
            mainImage.src = product_images[currentIndex];
            updateThumbnails();
        }

        function resetInterval() {
            clearInterval(intervalId);
            intervalId = setInterval(showNextImage, intervalTime);
        }

        function updateThumbnails() {
            // Remove active class from all thumbnails
            var thumbnails = document.querySelectorAll('.thumbnail-image');
            thumbnails.forEach(function(thumbnail) {
                thumbnail.classList.remove('active');
            });

            // Add active class to the current thumbnail
            var activeThumbnail = document.getElementById('thumbnail-' + currentIndex);
            activeThumbnail.classList.add('active');
        }

        // Set initial interval for automatic image change
        intervalId = setInterval(showNextImage, intervalTime);

        // Expose showImage function to global scope for onclick event
        window.showImage = showImage;

        // Initialize the first thumbnail as active
        updateThumbnails();
    });
</script>
</script>

</html>
