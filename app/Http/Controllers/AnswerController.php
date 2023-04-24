<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\ListRequest;
use App\Http\Requests\ScoreRequest;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\ResultRequest;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public  $count;
    
    public function list(ListRequest $request) {
        $subject = Subject::where('id',$request['subject_id'])->with('projects')->first();
        $result = Answer::where('project_id',$request['project_id'])->first();
        $count = $this->count($subject->projects()->get());
        $results = $this->results($request['subject_id']);
            if($request['project_id'] == null){
                $project=$subject->projects()->first();
            }else{
                $project=$this->project($request['project_id']);
            }
        return view('subject.list',[
            'subject'=>$subject,
            'project' => $project,
            'count' => $count,
            'results' => $results,
            'result' => $result
        ]);
    }
    
    private function project($id){
        $project = Project::where('id',$id)->first();
        return $project;  
    }
    
    public function answer(AnswerRequest $request){
        $answer = Answer::where('project_id',$request['project_id'])->first();
        if($answer == null)
        $answer = new Answer();
        $answer->user_id = Auth::User()->id;
        $answer->subject_id = $request['subject_id'];
        $answer->project_id = $request['project_id'];
        $answer->answer_come = $request['answer_come'];
        $answer->answer_real = $request['answer_real'];
        $answer->save();
        return redirect()->back();   
    }
    
    private function count($projects){
        $a=1;
        foreach($projects as $project){
            $this->count[$a++]=$project->id;
        }
        if($this->count==null) $this->count[1]=0;
        return $this->count;
    }
    
    public function results($id){
        $where = [['subject_id',$id],['user_id', Auth::user()->id]];
        $results = Answer::where($where)->get();
        return $results;
    }

    public function result(ResultRequest $request){
        $count = sizeof($request->count);
        $results = $this->results($request->id);
        $correct = 0;
        $incorrect = 0;
        if($results!=null){
            foreach($results as $result){
                $result->answer_real==$result->answer_come ? $correct+=1 : $incorrect+=1;
                $result->delete();
            }
        }
        return redirect()->route('score',[
            'correct'=>$correct,
            'incorrect'=>$incorrect,
            'count'=>$count
        ]); 
    }
    
    public function score(ScoreRequest $request) {
        return view('subject.score',[ 
        'correct' =>$request->correct,
        'incorrect' =>$request->incorrect,
        'count' =>$request->count,
        ]);
    }
}
