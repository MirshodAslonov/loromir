
@extends('layouts.app')
@section('content')
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>
  
                  <form  method="post" action="{{ route('register')}}">
                    @csrf
                    <div class="mb-3">
                      <input  type="text" class="form-control"  name="name" placeholder="Full name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control"   name="email" placeholder="Your email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror 
                    <div class="mb-3">
                      <input type="text" class="form-control"   name="phone" placeholder="Phone number" value="{{ old('phone') }}" required>
                    </div>
                    @error('phone')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror 
                    <div class="mb-3">
                      <input type="text" class="form-control"   name="password" placeholder="Password" value="{{ old('password') }}" required>
                    </div>
                    @error('password')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror 
                    <div class="d-grid gap-2">
                      <button class="btn btn-outline-success " type="submit">Register</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="assets/img/slide/login.png" class="img-fluid" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
  
  @endsection