@extends('layouts.admin')
@section('content')
<h1>Welcome </h1><br>

    <div class="row my-1">
        <div create="col-md-4 offset-md-8 text-right">
            <a href="{{ route('products.create')}}">
                <button class="btn btn-primary">+ Add product</button>
            </a>
        </div>
    </div>

    <div class="container-fluid" >
        @foreach($Products as $product)
            <div class="col-3" style="float:left">
                <div class="row-2">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('image/products/'.$product->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product -> name}}</h4>
                            <small class="card-title">Details: {{ $product -> details}}
                            </small><br>
                            <small class="card-title">Quantity: {{ $product -> quantity}}
                            </small>
                            <br>
                            <p class="card-text">P{{ $product -> price}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('products.edit',['id' => $product->id]) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('products.destroy',[$product->id]) }}" method="POST">
                                @csrf
                                {{method_field('delete')}}
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

{{-- <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Detail</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Products as $product)
    <tr>
        <td>
        <img id="productImage" src="{{ asset('image/products/'.$product->image) }}" class="img-fluid product-image" alt="Product Image"/>

        </td>
        <td>{{ $product -> name}}</td>
        <td>{{ $product -> details}}</td>
        <td>{{ $product -> price}}</td>
        <td>{{ $product -> quantity}}</td>
        <td style="display:flex">
            <a href="{{ route('products.edit',['id' => $product->id]) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('products.destroy',[$product->id]) }}" method="POST">
                @csrf
                {{method_field('delete')}}
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.table').DataTable()

            })
    </script>
    @endpush --}}


@endsection
