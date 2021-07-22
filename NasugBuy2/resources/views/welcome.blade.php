@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center">
                            <img src="{{ asset('img/Nasugbuy.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                    <div class="col-7" style="float:right-center">
                                        <div class="center">
                                            <div class="row my-5">
                                                <div class="col-mid-4  text-center">
                                                    <img class="img-profile rounded-circle" width="100px" height="100px" src="{{ asset('img/User-Icon.png') }}">
                                                    <a href="{{ route('login')}}">
                                                        <button class="btn btn-primary">Nasugbu Local</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="center">
                                            <div class="row my-5">
                                                <div class="col-mid-4  text-center">
                                                    <img class="img-profile rounded-circle" width="100px" height="100px" src="{{ asset('img/R.png') }}">
                                                    <a href="{{ route('login')}}">
                                                        <button class="btn btn-primary">  Local Store Owner</button>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
