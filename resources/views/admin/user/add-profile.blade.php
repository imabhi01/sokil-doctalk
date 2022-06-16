@extends('layouts.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Doctor's Profile</h4>
            @if(isset($user->userProfile))
                {{ Form::model($user->userProfile, ['route' => ['users.update.profile', $user->userProfile->id], 'method' => 'POST', 'files' => true]) }}
                @method('PUT')
            @else
                {{ Form::open(['route' => ['users.store.profile', $user->id], 'method' => 'POST', 'files' => true]) }}
                @method('POST')
            @endif

                @csrf
                @include('admin.user.add-profile-form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection