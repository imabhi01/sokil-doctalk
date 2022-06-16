@extends('layouts.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add User</h4>
            <p class="card-description">
            </p>
            {{ Form::open(['route' => ['users.store']]) }}
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    {{ Form::text('name', null,  ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    {{ Form::email('email', null,  ['class' => 'form-control', 'placeholder' => 'Email']) }}
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tel">Mobile Number</label>
                    {{ Form::tel('mobile', null,  ['class' => 'form-control', 'placeholder' => 'mobile']) }}
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" id="" placeholder="Password" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="mobile">Role</label>
                    {{ Form::select('role', ['doctor' => 'Doctor', 'patient' => 'Patient'], null, ['class'=> 'form-control', 'placeholder' => 'Select Role']) }}
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
           {{ Form::close() }}
        </div>
    </div>
</div>
@endsection