@extends('layouts.master')
@push('styles')
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
@endpush
@section('content')
<div class="home-page">
    <div class="home-container">
        <div class="col-sm-12">
            @include('frontend.partials.carousel')
            
            <div class="page-divider">
                <h1 class="page-divider-text">doctalk</h1>
                <img class="page-divider-image" src="{{ asset('images/products/image 17.png') }}" alt="">
            </div>
            <div class="card-list">
                <div class="card card-left">
                    <h4 class="card-title">Consult with doctor</h4>
                    <button class="card-button">Order Now</button>
                </div>
                <div class="card card-center">
                    <h4 class="card-title">Order Medicine</h4>
                    <button class="card-button">Order Now</button>
                </div>
                <div class="card card-right">
                    <h4 class="card-title">Lab Tests</h4>
                    <button class="card-button">Order Now</button>
                </div>
            </div>
            
            @include('frontend.partials.products')

            @include('frontend.partials.deals')

            @include('frontend.partials.health-article')

            <div class="achieve-goals">
                <div class="achieve-list">
                    <div class="achieve-title-item">
                        <h3 class="achieve-title">Achieve Your Goals with EduMall</h3>
                    </div>
                    <p class="achieve-desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, illo expedita tempore deleniti quam cum debitis rem eaque deserunt voluptatum blanditiis repudiandae nulla porro odit non numquam repellendus dolorum. Ratione.</p>
                    <img src="{{ asset('images/products/image 26.png') }}" alt=""> 
                    <button class="achieve-button">
                    <a href="{{ route('register') }}" class="achieve-anchor">Register for Free</a>
                    </button>
                </div>
                <img class="achieve-image" src="{{ asset('images/carousel/achieve.PNG') }}" alt="">
            </div>
        </div>

        <div class="sitewide">
            <div class="sitewide-list">
                <div class="sitewide-title-item">
                    <h3 class="sitewide-title">25% off sitewide</h3>
                </div>
                <p class="sitewide-desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, illo expedita tempore deleniti quam cum debitis rem eaque deserunt voluptatum blanditiis repudiandae nulla porro odit non numquam repellendus dolorum. Ratione.</p>
                <a class="sitewide-button">
                    Limited Time offer
                </a>
            </div>
            <img class="sitewide-image" src="{{ asset('images/carousel/gifts.PNG') }}" alt="">
        </div>

        <div class="col-sm-12">
            <div class="last-banner">
                <img class="last-banner-img" src="{{ asset('images/carousel/image 40.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- <div class="right-side-div shadow-sm">
        <p class="side-title">Excellence Service Provider in <br> <span class="side-text">Nepal</span></p>
    </div> -->
</div>
@endsection

@push('scripts')
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script>
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        center: true,
        items:2,
        loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        responsive:{
            600:{
                items:1
            }
        },
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    });
});
</script>
@endpush