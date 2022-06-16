@extends('layouts.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Product</h4>
            {{ Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) }}
                @method('POST')
                @csrf
                @include('admin.product._form')
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-light" href="{{ route('products') }}">Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection