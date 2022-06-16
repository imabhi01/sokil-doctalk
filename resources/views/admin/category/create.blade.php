@extends('layouts.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Category</h4>
            {{ Form::open(['route' => 'categories.store', 'method' => 'POST']) }}
                @method('POST')
                @csrf
                @include('admin.category._form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection