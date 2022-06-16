@extends('layouts.master')
@push('styles')
<style>
    .cart-table {
        border: 1px solid #ccc;
        padding: 10px;
    }

    button.delete-cart {
        border: none;
        background-color: #fff;
    }

    i.far.fa-trash-alt {
        font-size: 26px;
        color: #f01111;
    }
    
    button.update-cart, a.update-cart {
        border: none;
        background-color: #007BC4;
        color: #fff;
        border-radius: 5px;
        width: 200px;
        padding: 10px;
        font-family: 'Orienta', sans-serif;
        cursor: pointer;
        font-weight: bolder;
        text-decoration: none;
        text-align:center;
    }

    button.minus, button.plus {
        border: none;
        background-color: #00B3AD;
        color: #fff;
        padding: 5px;
        font-size: 28px;
        border-radius: 6px;
        font-weight: 700;
        font-family: 'Open Sans', sans-serif;
        cursor: pointer;
    }

    input#qty {
        font-size: 30px;
        border-radius: 5px;
        outline: none;
        text-align: center;
        border: 1px solid #ccc;
        width: 70px;
    }

    .discount {
        margin-top: 45px;
    }

    .discount-box, .your-order {
        border: 1px solid #ccc;
        padding: 25px;
    }

    p.discount-heading{
        font-size: 18px;
        color: #504c4c;
        font-family: 'Orienta', sans-serif;
        cursor: pointer;
        font-weight: bolder;
        text-transform: uppercase;
    }

    .coupon {
        margin-top: 15px;
    }
    
    a.checkout-button {
        border: none;
        background-color: #007BC4;
        color: #fff;
        padding: 12px;
        border-radius: 6px;
        font-family: 'Orienta', sans-serif;
        cursor: pointer;
        font-weight: bolder;
        text-decoration: none;
    }

    .subtotal, .total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 6px;
    }

    .subtotal {
        border-bottom: 1px solid #ccc;
    }

    p.total-text, p.total-value{
        color: #000;
        border-radius: 6px;
        font-family: 'Orienta', sans-serif;
        cursor: pointer;
        font-weight: bolder;
    }
    a.minus, a.plus {
        color: #000;
    }

    .quantity {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    i.fas.fa-plus, i.fas.fa-minus {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
    }
    
    img, svg {
        width: 50%;
    }

    a.delete-cart {
        cursor: pointer;
    }
</style>
@endpush
@section('content')
<div class="container">
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! \Session::get('success') !!}</strong> 
        </div>
    @endif

    @if(count($data) > 1)
        <form action="{{ route('update.cart') }}" method="POST">
            @method('POST')
            @csrf
            <div class="cart-table">
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center">PRODUCT</th>
                        <th class="text-center">TITLE</th>
                        <th class="text-center">PRICE</th>
                        <th class="text-center">QTY</th>
                        <th class="text-center">SUBTOTAL</th>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $item)
                            @if(is_array($item))
                                <input type="hidden" value="{{ $item['id'] }}" name="cart_id[]">
                                <tr>
                                    <td class="text-center">
                                        <img class="cart-image" src="{{ asset('uploads/'.$item['image']) }}" alt="">
                                    </td>
                                    <td class="text-center">{{ $item['product_title'] }}</td>
                                    <td class="text-center">NPR. {{ $item['price'] }}</td>
                                    <td class="text-center">
                                        <div class="quantity">
                                            <a class="minus" data-id="{{ $item['id'] }}"><i class="fas fa-minus"></i></a>
                                            <input type="text" value="{{ $item['qty'] }}" name="qty[]" id="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                            <a class="plus" data-id="{{ $item['id'] }}"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-center">NPR. {{ $item['subtotal'] }}</td>
                                    <td class="text-center">
                                        <a class="delete-cart" data-id="{{ $item['id'] }}" data-url="{{ route('delete.cart.item', $item['id']) }}"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <button class="update-cart" type="submit">Update Shopping Cart</button>
            </div>

        </form>

        <div class="discount">
            <div class="row">
                <div class="col-sm-6">
                    <div class="discount-box">
                        <p class="discount-heading">Discount Codes</p>
                        <p class="discount-desc">Enter your coupon code if you have one.</p>
                        <input type="text" class="form-control" placeholder="Coupon Code">
                        <div class="coupon">
                            <a class="checkout-button">Apply Coupon</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <p class="discount-heading">Your Order</p>
                        <div class="subtotal">
                            <p class="subtotal-text">Sub Total</p>
                            <p class="subtotal-value">NPR {{$data['total']}}</p>
                        </div>
                        <!-- <hr> -->
                        <div class="total">
                            <p class="total-text">Grand Total</p>
                            <p class="total-value">NPR {{$data['total']}}</p>
                        </div>
                        <div class="checkout">
                            <a class="checkout-button" href="{{ route('order.checkout') }}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="empty-cart">
            <img src="{{ asset('images/empty-cart.png') }}" alt="">
            <a class="update-cart" href="{{ route('/') }}">Return to HomePage</a>
        </div>

    @endif

    
</div>
@endsection

@push('scripts')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( ".plus" ).click(function(e) {
        var cart_id = $(this).data('id');
        var inputValue = $(this).siblings('input').val();
        $(this).siblings('input').val(Number(inputValue) + Number(1));
    });

    $( ".minus" ).click(function() {
        var cart_id = $(this).data('id');
        var inputValue = $(this).siblings('input').val();
        if(inputValue >=2){
            $(this).siblings('input').val(Number(inputValue) - Number(1));
        }
    });

    $(".delete-cart").click(function(e){
        var cartId = $(this).data('id');
        var url = $(this).data('url');

        $.ajax({
            type: 'DELETE',
            url: url,
            data: {
                'cartId': cartId
            },
            success: function(data){
                window.location.href = "{{URL::to('cart')}}";
                alert(data.message);
            },
            error: function(error){
                alert('Something went Wrong!');
            }
        })

    });
</script>
@endpush