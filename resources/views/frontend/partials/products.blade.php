<div class="products">
    <div class="heading">
        <h2 class="row-title">
            Medicines
        </h2>
        <div class="row">
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
            @endforelse
        </div>
    </div>
</div>