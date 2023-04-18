<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public  $count;

    public function listPage($id) {
        $list = Subject::where('id',$id)->first();
        $projects=$list->projects()->get();
        $count=$this->count($projects);
        $project=Project::where('id',$count[1])->first();
        dd($project);
        return view('subject.list',[
            'list'=>$list,
            'project' => $project,
            'count' => $count
        ]);
    }
    
    public function count($projects){
    $a=1;
        foreach($projects as $project){
            $this->count[$a++]=$project->id;
        }
        if($this->count==null) $this->count[1]=0;
        return $this->count;
    }

    public function come($id){
        $project = Project::where('id',$id)->first();
        $list = Subject::where('id',$project->subject_id)->first();
        $projects=$list->projects()->get();
        $count = $this->count($projects);
        return view('subject.list',[
            'list'=>$list,
            'project' => $project,
            'count' => $count
        ]);
         
    }
    public function answer(Request $request){
        //      dd($request['subject_id']);
        

        return redirect()->back();
         
    }
}
