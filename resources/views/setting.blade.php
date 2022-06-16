@extends('layouts.master')
@push('styles')
<style>
    input[type="file"] { display: none; }
    .document{
        position: relative;
    }
    
    i.fas.fa-cloud-upload-alt {
        position: absolute;
        top: 40px;
        margin-left: -50px;
        font-size: 20px;
        color: lightslategray;
    }

    .continue-button {
        background: #007BC4;
        color: #fff;
        padding: 10px;
        border-radius: 2px;
        float: right;
        font-family: 'Open Sans', sans-serif;
        width: 300px;
        border: 1px solid #f5f5f5;
    }

    .continue-button:hover {
        color: #000;
    }

    .invalid-feedback{
        display: block;
    }

    span.invalid-feedback-image {
        position: absolute;
        top: 80px;
        margin-left: 45px;
        font-size: .875em;
        color: #dc3545;
    }

    a.close {
        float: right;
        font-size: 18px;
        text-decoration: none;
    }

    img.profile-image {
        max-width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
    }

    img.img-thumbnail {
        max-width: 100%;
        height: 100px;
    }
</style>
@endpush
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                Basic Information
            </div>
            <div class="card-body">
                <p class="card-text">Please fill up the mentioned information in order to get register in doctalk.</p>
                
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{!! \Session::get('success') !!}</strong> 
                    </div>
                @endif

                @error('user_id')
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $message }}</strong> 
                </div>
                @enderror

            </div>
            <div class="form-body">
                @if(isset($userProfile))
                    {{ Form::model($userProfile, ['class' => 'row g-3', 'route' => ['user.setting.update', $userProfile->id], 'files' => true]) }}
                    @method('PUT')
                @else
                    {{ Form::open(['class' => 'row g-3', 'route' => 'user.setting', 'method' => 'POST', 'files' => true]) }}
                    @method('POST')
                @endif

                    @csrf
            
                    @include('partials.settings-form')
                    <div class="col-12">
                        <div class="form-group">
                            @if(isset($userProfile))
                                <button type="submit" class="continue-button">Update</button>
                            @else
                                <button type="submit" class="continue-button">Continue</button>
                            @endif
                        </div>
                    </div>

                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush