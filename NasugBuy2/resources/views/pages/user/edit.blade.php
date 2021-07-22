    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form action="{{ route('user.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name" value = "{{ Auth::user()->name }}">
            @error($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                 <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Store Name</label>
            <input type="text" name="storename" class="form-control form-control-user" id="storename" value = " {{ Auth::user()->storename }}">
            @error($errors->has('storename'))
            <span class="invalid-feedback" role="alert">
                 <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Store Address</label>
            <input type="text" name="storeaddress" class="form-control form-control-user" id="storeaddress" value = "{{ Auth::user()->storeaddress }}">
            @error($errors->has('storeaddress'))
            <span class="invalid-feedback" role="alert">
                <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Contact</label>
            <input type="text" name="contact" class="form-control form-control-user" id="contact" value = "{{ Auth::user()->contact }}">
            @error($errors->has('contact'))
            <span class="invalid-feedback" role="alert">
                <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" value = "{{ Auth::user()->email }}">
            @error($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                 <small class="text-danger">{{$message}}</small>
            </span>
            @enderror
        </div>
        {{-- <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                @error($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                     <small class="text-danger">{{$message}}</small>
                </span>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="password" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required autocomplete="new-password">
            </div>
        </div> --}}

    <button type="submit" class="btn btn-primary">Update Profile</button>

</form>

