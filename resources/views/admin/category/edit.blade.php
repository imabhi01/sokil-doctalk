@extends('layouts.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit category</h4>
            <p class="card-description">
            </p>
            {{ Form::model($category, ['route' => ['categories.update', $category->id]]) }}
                @method('PUT')
                @csrf
                @include('admin.category._form')
           {{ Form::close() }}
        </div>
    </div>
</div>
@endsection