@extends('layouts.admin')
@section('content')
<h3>Product list</h3>
    <div class="row my-4">
        <div class="col-mid-4  text-left">
            <a href="{{ route('products')}}">
                <button class="btn btn-primary">Back to list</button>
            </a>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form action="{{ route('products.update') }}" method="POST">
        @csrf

        <div class="image-wrapper text-center">
                <img id="productImage" src="{{ asset('image/products/'.$product->image) }}" with="100px" height="100px" class="img-fluid product-image" alt="Product Image"/>
            </div>
            {{-- <div class="form-group">
              <label for="brand">Upload Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="customfile" value="{{$product->image}}" data-image-id="productImage">
                    <label class="custom-file-label" for="customFile" id="fileupload" name="file">{{$product->image}}</label>
                </div>
                @if($errors->has('file'))
                    <small class="text-danger">{{$errors->get('file')[0] }}</small>
                @endif
            </div> --}}

            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="form-group">
                <label for="exampleInputEmail">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Product name" value = "{{ $product->name}}">
                @error($errors->has('name'))
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Product Details</label>
                <input type="text" class="form-control" id="details" name="details" placeholder="Product details" value = "{{ $product->details}}">
                @error($errors->has('details'))
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Product price" value = "{{ $product->price}}">
                @error($errors->has('price'))
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Product Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Product quantity" value = "{{ $product->quantity}}">
                @error($errors->has('quantity'))
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection

{{-- @push('scripts')

<script>

//preview image
$('.custom-file-input').on('change',function(){
    readURL($(this)[0],'productImage')
})
    function readURL(input, imageId){
        if(input.files && input.files[0]){
            var reader = FileReader();

            reader.onload = function(e){
                console.log(e)
                $(`#${imageId}`).attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush --}}
