
@extends('layouts.app')
@section('content')
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <img  src="{{asset('assets/img/team/create1.jpg')}}"  >
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <form  method="post" action="{{ route('create')}}"  enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-3"> 
                      <select  class="form-select" name="subjectId" required>
                        <option selected disabled value="">Choose the Subject</option>
                     @foreach($subjects as $subject)  
                     <option  value="{{$subject->id}}">{{$subject->name}}</option>
                     @endforeach
                      </select>
                      </div>                   
                      <div class="mb-3">
                        <input type="text" class="form-control"   name="a"  placeholder="Answer  A" value="{{ old('a') }}" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control"   name="b"  placeholder="Answer  B" value="{{ old('b') }}" required>
                    </div>
                    <div class="d-grid gap-2">
                       <a href="{{route('welcome')}}"><button  class="btn btn-outline-secondary " type="button"><-Home </button></a>
                    </div>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1"> 
                    <div class="mb-3">
                      <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control"   name="c"  placeholder="Answer  C" value="{{ old('c') }}" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control"   name="d"  placeholder="Answer  D" value="{{ old('d') }}" required>
                    </div>
                    <div class="d-grid gap-2">
                      <button class="btn btn-outline-success " type="submit">Save </button>
                    </div>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  @endsection