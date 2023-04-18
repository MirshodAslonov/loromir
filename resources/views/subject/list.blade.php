
@extends('layouts.app')
@section('content')
<form  method="post" action="{{ route('answer',$list->id)}}">
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
               <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{$list->name}}</p>
            </div>
            <div class="m-3"></div>
            <div class="btn-group me-2 mb-3" role="group" aria-label="First group">
                <?php $a=1 ?>
            @foreach($count as $con)
                <a href="{{route('come',$con)}}"><button type="button" class="btn btn-outline-secondary">{{$a++}}</button></a>
            @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 d-flex align-items-center order-1 order-lg-2">
                    <img  src="{{asset('/storage/images/questions/'.$project->question)}}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-2">
                        @csrf   

                        <div class="d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="answer" id="a" value="{{$project->a}}" >
                            <label class="btn btn-outline-success" for="a">{{$project->a}}</label>
                        </div>
                        <div class=" d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="answer" id="b" value="{{$project->b}}" >
                            <label class="btn btn-outline-success" for="b">{{$project->b}}</label>
                        </div>
                        <div class=" d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="answer" id="c" value="{{$project->c}}">
                            <label class="btn btn-outline-success" for="c">{{$project->c}}</label>
                        </div>
                        <div class=" d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="answer" id="d" value="{{$project->d}}" >
                            <label class="btn btn-outline-success" for="d">{{$project->d}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3"></div>
        <div class=" d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-outline-primary">Submit</button>   
        </div>
    </div>
</div>
</div>
<input type="hidden" name="project_id" value="{{$project->id}}">
</form>
@endsection