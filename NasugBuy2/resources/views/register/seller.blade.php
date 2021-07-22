<form class="user" method="POST" action="{{ route('register') }}">
@csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name">
                                @error($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                     <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="storename" class="form-control form-control-user" id="storename" placeholder="StoreName">
                                @error($errors->has('storename'))
                                <span class="invalid-feedback" role="alert">
                                     <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="storeaddress" class="form-control form-control-user" id="storeaddress" placeholder="Store Address">
                                @error($errors->has('storeaddress'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact" class="form-control form-control-user" id="contact" placeholder="Contact number">
                                @error($errors->has('contact'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <input type="hidden" name="role" value="Seller">

                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                @error($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                     <small class="text-danger">{{$message}}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
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
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Register Account') }}
                            </button>
                            <!-- <hr> -->
                            <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
