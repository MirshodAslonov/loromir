
@extends('layouts.app')
@section('content')
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
               <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{$list->name}}</p>
        </div>
      </div>
    </div>
</div>
<?php $count=0 ?>
@foreach ($list->projects as $project) 
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
              <span>{{++$count}}-Question</span>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 d-flex align-items-center order-1 order-lg-2">
                    <img  src="{{asset('/storage/images/questions/'.$project->question)}}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-2">
                    <form  method="post" action="{{ route('answer',$list->id)}}">
                        @csrf   
                        <div class="d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="{{$count}}" id="{{$count}}" value="{{$project->a}}" >
                            <label class="btn btn-outline-success" for="{{$count}}">{{$project->a}}</label>
                        </div>
                        <div class=" d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="{{$count}}" id="{{$count+500}}" value="{{$project->b}}" >
                            <label class="btn btn-outline-success" for="{{$count+500}}">{{$project->b}}</label>
                        </div>
                        <div class=" d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="{{$count}}" id="{{$count+1000}}" value="{{$project->c}}">
                            <label class="btn btn-outline-success" for="{{$count+1000}}">{{$project->c}}</label>
                        </div>
                        <div class=" d-grid gap-2 mb-3">
                            <input type="radio" class="btn-check" name="{{$count}}" id="{{$count+1500}}" value="{{$project->d}}" >
                            <label class="btn btn-outline-success" for="{{$count+1500}}">{{$project->d}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
<button type="submit" class="btn btn-outline-success "> Log in </button>
</form>
@endsection