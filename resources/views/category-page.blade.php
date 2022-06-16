@extends('layouts.master')
@push('styles')
<style>
    .doctors{
        display: flex;
        margin-top: 25px;
    }
    .specialities{
        display: flex;
    }
    .product-info {
        text-align: center;
    }
    a.consult-now{
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
    }
    .doctor-desc{
        overflow: hidden;
    }

    .search{
        position:relative;
    }
    
    #label {
        position: absolute;
        top: 50%;
        margin-left: 10px;
        padding: 15px;
        transform: translate(0,-50%);
        font-size: 20px;
        font-family: 'Open Sans', sans-serif;
        color: #ccc;
    }

    i.fa.fa-search {
        font-size: 20px;
        margin: 10px;
        color: #ccc;
    }

    input.form-control {
        font-size: 30px;
    }

    .doctor-heading, .health-heading{
        font-size: 28px;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;
        line-height: 80px;
        cursor: pointer;
    }

    .health-concerns {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    img.health-img {
        min-height: 252px;
    }

    .health-block.shadow-sm {
        margin: 10px;
    }

    a{
        text-align: center;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="doctors">
            @forelse($products as $key => $product)
                <div class="product-item col-sm-6 col-md-2 col-xs-12">
                    <div class="product-block">
                        <a href="{{ route('product.detail', $product->slug) }}"><img class="product-img" src="{{ asset('uploads/'.$product->image) }}" alt="featured-img"></a>
                        <div class="product-info">
                            <p class="product-title">
                                <a href="{{ route('product.detail', $product->slug) }}" class="product-title-anchor">{{ $product->title ?? '' }}</a>
                            </p>
                            <p class="product-desc">{{ $product->desc }}</p>
                            <p class="product-price">Rs. {{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>Sorry. No Products found on this category</p>
            @endforelse
        </div>
    </div>
</div>
@endsection