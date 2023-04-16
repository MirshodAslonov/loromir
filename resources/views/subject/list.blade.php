
@extends('layouts.app')
@section('content')

<div class="mb-3"></div>
<div class="container h-100">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <div class="d-grid gap-2 d-md-flex justify-content  me-auto">
            {{ $projects->links() }} 
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content mb-3"> 
           <a href="{{route('welcome')}}"><button type="button" class="btn btn-warning ">Finish the test</button></a>
        </div> 
</div>
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{$list->name}}</p>
                  @foreach ($projects as $project) 
                  <form  method="post" action="{{ route('login')}}">
                    @csrf   
                    <div class="d-grid gap-2 mb-3">
                        <input type="radio" class="btn-check" name="answer" id="a"   required>
                        <label class="btn btn-outline-success" for="a">{{$project->a}}</label>
                    </div>
                    <div class=" d-grid gap-2 mb-3">
                        <input type="radio" class="btn-check" name="answer" id="b"  required>
                        <label class="btn btn-outline-success" for="b">{{$project->b}}</label>
                    </div>
                    <div class=" d-grid gap-2 mb-3">
                        <input type="radio" class="btn-check" name="answer" id="c"  required>
                        <label class="btn btn-outline-success" for="c">{{$project->c}}</label>
                    </div>
                    <div class=" d-grid gap-2 mb-3">
                        <input type="radio" class="btn-check" name="answer" id="d"  required>
                        <label class="btn btn-outline-success" for="d">{{$project->d}}</label>
                    </div>
                </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img  src="{{asset('/storage/images/questions/'.$project->question)}}" class="img-fluid" alt="Sample image">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
  @endsection