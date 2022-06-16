<div class="form-group">
    <label for="title">Title</label>
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <div class="form-check form-check-flat form-check-primary">
        <label class="form-check-label">
        Mark Header Menu
        @if(isset($category))
            {{ Form::checkbox('is_header_menu', null, $category->is_header_menu, ["class" => "form-check-input"]) }}
        @else
            {{ Form::checkbox('is_header_menu', null, 0, ["class" => "form-check-input"]) }}
        @endif
        </label>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
<a class="btn btn-light" href="{{ route('categories') }}">Cancel</a>