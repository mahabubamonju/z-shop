@extends('frontend.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Our Natural</span> Hair Products</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet, erat non
                    malesuada consequat, nibh erat tempus risus.</p>
            </div>
            <div class="row g-4">
                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="product-item text-center border h-100 p-4">
                        <img class="img-fluid mb-4" src="{{ asset('/') }}frontend-assets/img/product-1.png"
                            alt="">
                        <div class="mb-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(99)</small>
                        </div>
                        <a href="#" class="h6 d-inline-block mb-2">{{ $product->title }}</a>
                        <h5 class="text-primary mb-3">${{ $product->price }}</h5>
                        <p class="text-dark mb-3">{{ $product->description }}</p>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
