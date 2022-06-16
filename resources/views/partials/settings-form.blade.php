<input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

<div class="col-12 form-block">
    <div class="col-md-6">
        <div class="form-group image-block">
            <label for="profile-picture" class="form-label">Profile Picture</label>
            <input type="file" name="profile_image" class="form-control" id="profile-picture">
            @error('profile_image')
                <span class="invalid-feedback-image" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="file-image">
                <label for="profile-picture">
                    @if(isset($userProfile))
                        <img class="profile-image" src="{{ asset('uploads/doctor-profile/'. $userProfile->profile_image) }}" alt="">
                    @else
                        <img src="{{ asset('images/Ellipse 19.png') }}" alt="file">
                    @endif
                </label>
            </div>
            <label for="profile-picture"><i class="fas fa-camera"></i></label>
        </div>
    </div>
    <div class="col-md-6">
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
    </div>
</div>
<div class="col-12 form-block">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">NMC / NAMC / NHPC Number</label>
            {{ Form::text('nmc_number', null, ['class' => 'form-control', 'placeholder'=> 'Please enter NMC / NAMC / NHPC Number']) }}
            @error('nmc_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group document">
            <label class="form-label">Medical Council Document (Optional)</label>
            <input type="file" class="form-control" id="document" name="document">
            <label for="document"><i class="fas fa-cloud-upload-alt">Upload Document</i> </label>
            <input type="text" class="form-control">
            @if(isset($userProfile))
                <img class="img-thumbnail" src="{{ asset('uploads/doctor-document/'. $userProfile->document) }}" alt="">
            @endif
        </div>
    </div>
</div>
<div class="col-12 form-block">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Speciality</label>
            {{ Form::text('speciality', null, ['class' => 'form-control', 'placeholder'=> 'Years Practiced']) }}
            @error('speciality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Qualification</label>
            {{ Form::select('qualification', ['Bachelors' => 'Bachelors', 'Masters' => 'Masters', 'Doctoral' => 'Doctoral'], null, ['class' => 'form-control', 'placeholder'=> 'Select Qualification']) }}
            @error('qualification')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-group">
    <label class="form-label">Description</label>
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=> 'Description']) }}
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>