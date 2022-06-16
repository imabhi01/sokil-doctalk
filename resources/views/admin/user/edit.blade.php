@extends('layouts.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Edit</h4>
            <p class="card-description">
            </p>
            {{ Form::model($user, ['route' => ['users.update', $user]]) }}
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="" placeholder="Name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="mobile">Phone</label>
                    <input type="tel" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="{{ $user->mobile }}">
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
                    <label for="mobile">Phone</label>
                    <select name="role" class="form-control" id="">
                        <option value="" selected disabled>Select Role</option>
                        <option value="doctor" @if($user->role == 'doctor') selected @endif>Doctor</option>
                        <option value="patient" @if($user->role == 'patient') selected @endif>Patient</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
           {{ Form::close() }}
        </div>
    </div>
</div>
@endsection