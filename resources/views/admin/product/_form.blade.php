@push('styles')
<style>
    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 10px;
        border-radius: 10px;
    }

    .prev-gallery {
        display: flex;
    }

    i.fas.fa-trash-alt {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endpush

@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{!! \Session::get('success') !!}</strong> 
    </div>
@endif

<div class="form-group">
    <label for="title">Category</label>
    @if(isset($selectedCategories))
        {{ Form::select('category_id', $categories, $selectedCategories, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
    @else
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
    @endif
    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
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
    <label for="description">Description</label>
    {{ Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}
    @error('desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="image">Image</label>
    {{ Form::file('image', ['class' => 'form-control', 'id' => 'upload']) }}
    @if(isset($product->image))
        <img class="img-thumbnail" src="{{ asset('uploads/'.$product->image) }}" alt="" style="margin-top: 5px;">
    @endif
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <img id="blah" src="#" alt="your image" style="display:none;"/>
</div>

<div class="form-group">
    <label  for="multiple-image">Choose Images</label>
    {{ Form::file('images[]', ['id' => 'gallery-photo-add', 'class' => 'form-control', 'multiple' => 'multiple']) }}
    <div class="gallery">

    </div>
    @if(isset($product->productImages))
        <div class="prev-gallery">
            @foreach($product->productImages as $image)
                <div class="image-box">
                    <img src="{{ asset('uploads/productImages/'. $image->image) }}" alt="">
                    <div class="delete-button">
                        <a href="#" class="delete-image" product-id="{{ $product->id }}" data-id="{{ $image->id }}" data-url="{{ route('products.image.delete', $image->id) }}">
                            <i class="fas fa-trash-alt" style="color: #ff6f6f;"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<div class="form-group">
    <label for="price">Price</label>
    {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price' ,'onkeyup' => "this.value=this.value.replace(/[^\d]/,'')"]) }}
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


@push('scripts')
<script>
    var imagesPreview = function(input, placeToInsertImagePreview) {

    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });

    upload.onchange = evt => {
        const [file] = upload.files
        if (file) {
            blah.src = URL.createObjectURL(file)
            blah.style.display = "block";
        }
    }

    $('.delete-image').on('click', function(e){
        e.preventDefault();
        console.log($(this).data('url'));
        $.ajax({
            type: 'DELETE',
            url: $(this).data('url'),
            data: {
                '_token': "{{ csrf_token() }}",
                'product_id': $(this).data('product_id'),
                'image_id': $(this).data('image_id')
            },
            success: function(data){
                alert(data.message);
                location.reload();
            }
        })
    });
</script>
@endpush