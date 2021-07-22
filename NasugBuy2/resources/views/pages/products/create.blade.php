@extends('layouts.admin')
@section('content')
<h3>Product list</h3>
    <div class="row my-4">
        <div class="col-mid-4 offset-md-10 text-right">
            <a href="{{ route('products')}}">
                <button class="btn btn-primary">Back to list</button>
            </a>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


            <input type="hidden" name="userid" value="{{ $user }}">
            <div class="image-wrapper text-center">
                <img id="productImage" src="" with="100px;" height="100px;" class="img-fluid product-image" alt="Product Image"/>
            </div>
            <div class="form-group">
              <label for="brand">Upload Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="customfile" data-image-id="productImage">
                    <label class="custom-file-label" for="customFile" id="fileupload" name="file" >Choose photo</label>
                </div>
                @if($errors->has('file'))
                    <small class="text-danger">{{$errors->get('file')[0] }}</small>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Product name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Product Details</label>
                <input type="text" class="form-control" id="details" name="details" placeholder="Product details">
                @error('details')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Category</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="category">
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Product price">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Product Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Product quantity">
                @error('quantity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection

@push('scripts')

<script>
$('.custom-file-input').on('change',function(){
    readURL($(this)[0],'productImage')
})

    function readURL(input, imageId){
        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function(e){
                console.log(e)
                $(`#${imageId}`).attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
