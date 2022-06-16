<div class="products">
    <div class="heading">
        <h2 class="row-title">
            <div class="title-text">
                Deals of the Day <span class="border-sign"> | </span> <p class="time-left">10:59 left</p>
            </div>
        </h2>
        <div class="row">
        @forelse($products as $key => $product)
            <div class="product-item col-md-2 col-sm-6 col-xs-12">
                <div class="product-block">
                    <a href="{{ route('product.detail', $product->slug) }}"><img class="product-img" src="{{ asset('uploads/'. $product->image) }}" alt="featured-img"></a>
                    <div class="product-info">
                        <p class="product-title"><a href="{{ route('product.detail', $product->slug) }}" class="product-title-anchor">{{ $product->title }}</a></p>
                        <p class="product-desc">{{ $product->desc }}</p>
                        <p class="product-price">Rs. {{ intVal($product->price) }}</p>
                    </div>
                    <div class="sale-tag">
                        <span class="sale">
                            20 % off
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>