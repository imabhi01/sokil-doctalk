@extends('layouts.master')
@push('styles')
<style>
    input[type="text"] {
        width: 40px;
        text-align: center;
        border: none;
        outline: none;
    }
    
    img.navigation-image {
        width: 130px;
        height: 130px;
        object-fit: cover;
    }
</style>
@endpush
@section('content')
<div class="container" id="product-section">
    <div class="row">
        <div class="col-md-6">
            <div class="product-detail shadow-sm">
                <img class="featured-image" src="{{ asset('uploads/'.$product->image) }}" alt="featured-img">
            </div>
            <div class="product-navigation">
                @if(count($product->productImages) > 0)
                    @foreach($product->productImages as $image)
                        <div class="product-detail-box shadow-sm">
                            <a href="#"><img class="navigation-image" src="{{ asset('uploads/productImages/'. $image->image) }}" alt="featured-img"></a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-info">
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{!! \Session::get('success') !!}</strong> 
                    </div>
                @endif
                @if (\Session::has('failure'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{!! \Session::get('failure') !!}</strong> 
                    </div>
                @endif
                <p class="product-detail-title">
                    <a href="{{ route('product.detail', $product->slug) }}" class="product-title-anchor">{{ $product->title ?? '' }}</a>
                </p>
                <p class="product-detail-desc">{{ $product->desc ?? ''}}</p>
                <p class="price-tag">NPR. {{ $product->price ?? ''}}</p>
            </div>
            <form action="{{ route('add.to.cart') }}" method="POST">
                @csrf
                <div class="cart-block shadow-sm">
                    <input type="hidden" name="user_id" value={{ auth()->user() ? auth()->user()->id : null }}>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="qty-text"><strong>Quantity: </strong></div>
                    <div class="inside-cart">
                        <a class="operation" id="minus"><i class="fas fa-minus"></i></a>
                        <input type="text" value="1" id="qty" name="qty" min="0" max="10">
                        <a class="operation" id="plus"><i class="fas fa-plus"></i></a> 
                    </div>
                    <div class="cart-button">
                        <button type="submit" class="add-button">Add to Cart</button>
                    </div>
                
                    <div class="wishlist">
                        <i class="fas fa-random"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- end row -->
    <div class="tab-container">
        <div class="row">
            <div class="col-md-10">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Additional Information</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="content">
                            <div class="long-desc">
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                            </div>
                            <div class="product-features">
                                <div class="heading">
                                    <p class="heading-serial">01</p>
                                    <strong class="heading-text">Powers 5 indicators of Brain Performance</strong>
                                </div>
                                <div class="product-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                </div>
                            </div>
                            <div class="product-features">
                                <div class="heading">
                                    <p class="heading-serial">02</p>
                                    <strong class="heading-text">Powers 5 indicators of Brain Performance</strong>
                                </div>
                                <div class="product-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                </div>
                            </div>
                            <div class="product-features">
                                <div class="heading">
                                    <p class="heading-serial">03</p>
                                    <strong class="heading-text">Powers 5 indicators of Brain Performance</strong>
                                </div>
                                <div class="product-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="content">
                            <div class="long-desc">
                                <p class="desc">Additional Information Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                            </div>
                            <div class="product-features">
                                <div class="heading">
                                    <p class="heading-serial">01</p>
                                    <strong class="heading-text">Powers 5 indicators of Brain Performance</strong>
                                </div>
                                <div class="product-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                </div>
                            </div>
                            <div class="product-features">
                                <div class="heading">
                                    <p class="heading-serial">02</p>
                                    <strong class="heading-text">Powers 5 indicators of Brain Performance</strong>
                                </div>
                                <div class="product-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                </div>
                            </div>
                            <div class="product-features">
                                <div class="heading">
                                    <p class="heading-serial">03</p>
                                    <strong class="heading-text">Powers 5 indicators of Brain Performance</strong>
                                </div>
                                <div class="product-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas est nihil harum consectetur voluptatibus id minus culpa, natus ipsa fuga! Beatae delectus natus, minima aut quia quae molestias corrupti autem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-products border-sm">
        <div class="related-heading">Related Products</div>
        <div class="produts-list">
            @forelse($relatedProducts as $key => $product)
            <div class="product-item col-sm-6 col-md-2 col-xs-12">
                <div class="product-block">
                    <a href="{{ route('product.detail', $product->slug) }}"><img class="product-img" src="{{ asset('uploads/'. $product->image) }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="{{ route('product.detail', $product->slug) }}" class="product-title-anchor">{{ $product->title }}</a>
                        </p>
                        <p class="product-desc">{{ $product->desc }}</p>
                        <p class="product-price">NPR. {{ $product->price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div><!-- end container -->
@endsection

@push('scripts')
<script>
    $( "#plus" ).click(function() {
        $("#qty").val(parseInt($('#qty').val()) + 1);
    });

    $( "#minus" ).click(function() {
        var initialValue = parseInt($('#qty').val());
        if(initialValue >= 2){
            $("#qty").val(initialValue - 1);
        }
    });

    $(".navigation-image").click(function(e){
        $(".featured-image").attr("src", e.target.src);
    });
</script>
@endpush