@extends('layouts.app')

@section('content')
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
    <div class="sidebar-brand-text mx-3">NasugBuy</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Home -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        <span>Home</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('products.cart') }}">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        <span>Taked items</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
    </a>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

    <!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">

                @include('partials.navbar')
                <!-- Begin Page Content -->

                <div class="container-fluid" >
                    @if(session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @foreach ($allproduct as $product)
                        <div class="col-3" style="float:left" >
                            <div class="row-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset('image/products/'.$product->image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <small>
                                            Store no.{{ $product -> userid}}
                                        </small>
                                        <h4 class="card-title">{{ $product -> name}}</h4>
                                        <small class="card-title">Details:
                                             {{ $product -> details}}
                                        </small><br>
                                        <small class="card-title">Quantity:
                                             {{ $product -> quantity}}
                                        </small>
                                        <p class="card-text">P{{ $product -> price}}</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('products.add',[$product->id]) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Take Item</button>
                                        </form>
                                        {{-- <i class="fa fa-heart" aria-hidden="true"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('partials.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to leave this page.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
