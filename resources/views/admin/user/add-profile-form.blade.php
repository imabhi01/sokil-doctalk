<input type="hidden" name="user_id" value="{{ $user->id }}">

<div class="form-group">
    <label for="image">Profile Image</label>
    {{ Form::file('profile_image', ['class' => 'form-control']) }}
    @if(isset($user->userProfile->profile_image))
        <img class="img-thumbnail" src="{{ asset('uploads/doctor-profile/'.$user->userProfile->profile_image) }}" alt="" style="margin-top: 5px; width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
    @endif
    @error('profile_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Gender</label>
    {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control', 'placeholder'=> 'Select Gender']) }}
    @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Years Practiced</label>
    {{ Form::number('years_practiced', null, ['class' => 'form-control', 'placeholder' => 'Years Practiced']) }}
    @error('years_practiced')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">NMC / NAMC / NHPC Number</label>
    {{ Form::text('nmc_number', null, ['class' => 'form-control', 'placeholder'=> 'Please enter NMC / NAMC / NHPC Number']) }}
    @error('nmc_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group document">
    <label class="form-label">Medical Council Document (Optional)</label>
    <input type="file" class="form-control" name="document">
    @if(isset($user->userProfile->document))
        <img class="img-thumbnail" src="{{ asset('uploads/doctor-document/'. $user->userProfile->document) }}" alt="" style="margin-top: 5px; width: 200px; height: 200px;">
    @endif
</div>

<div class="form-group">
    <label class="form-label">Speciality</label>
    {{ Form::text('speciality', null, ['class' => 'form-control', 'placeholder'=> 'Years Practiced']) }}
    @error('speciality')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Qualification</label>
    {{ Form::select('qualification', ['Bachelors' => 'Bachelors', 'Masters' => 'Masters', 'Doctoral' => 'Doctoral'], null, ['class' => 'form-control', 'placeholder'=> 'Select Qualification']) }}
    @error('qualification')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Description</label>
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=> 'Description']) }}
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<button type="submit" class="btn btn-primary mr-2">@if(isset($user->userProfile)) Update @else Submit @endif</button>
<a class="btn btn-light" href="{{ route('users') }}">Cancel</a>