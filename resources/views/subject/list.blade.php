
@extends('layouts.app')
@section('content')

<form  method="post" action="{{ route('answer',$subject->id)}}">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-1 col-xl-11">
        <div class="card text-black mb-3" style="border-radius: 50px;">
               <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-4 mt-4">{{$subject->name}}</p>
            </div>
            @if($project!=null)
            <div class=" gap-2 d-md-flex justify-md-end">
                <a href="{{route('result',['id'=>$subject->id,'count'=>$count])}}"><button type="button" class="btn btn-warning">Finish</button></a>   
            </div>
            <div class="m-3"></div>
            <div class="btn-group me-2 mb-3" role="group" aria-label="First group">
                <?php $a=1?>
                <?php $check=0 ?>
            @foreach($count as $con)
                @if($results!=null)
                    @foreach($results as $res)
                        @if($res->project_id == $con)
                        <input type="hidden"  {{$check=1}}>
                        @endif
                    @endforeach
                    @if($check==0 && $con!=$project->id)
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-outline-secondary">{{$a++}}</button></a>
                    @elseif($con==$project->id) 
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-secondary">{{$a++}}</button></a>
                    @else
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-success">{{$a++}}</button></a>
                    @endif
                    <input type="hidden"  {{$check=0}}>
                @else
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-outline-secondary">{{$a++}}</button></a>
                @endif
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
                        <?php $answers = [$project->a, $project->b, $project->c, $project->d];
                        shuffle($answers);
                        ?>
                        @foreach($answers as $answer)
                            <div class="d-grid gap-2 mb-3" >
                                <input type="radio" class="btn-check" name="answer_come" id={{$answer}} value="{{$answer}}"  @if($result!=null){{ $result->answer_come == $answer ? "checked" : '' }} @endif required>
                                <label class="btn btn-outline-success" for={{$answer}}>{{$answer}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3"></div>
        <div class=" gap-2 d-md-flex justify-content-md-end">
            @if(auth()->user()->email=='admin@gmail.com')
            <a href="{{route('delete',$project->id)}}"><button type="button" class="btn btn-outline-danger">Delete</button></a> 
            @endif  
            <button type="submit" class="btn btn-outline-primary">Save</button>   
        </div>
    </div>
</div>
</div>
<input type="hidden" name="answer_real" value="{{$project->a}}">
<input type="hidden" name="project_id" value="{{$project->id}}">
<input type="hidden" name="subject_id" value="{{$subject->id}}">
</form>

@endif
@endsection