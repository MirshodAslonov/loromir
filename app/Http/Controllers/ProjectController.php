<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\ListRequest;
use App\Http\Requests\CreateRequest;
use Illuminate\Database\QueryException;

class ProjectController extends AnswerController
{
    
    public function list(ListRequest $request) {
        $subject = Subject::where('id',$request['subject_id'])->with('projects')->first();
        $projects = $subject->projects()->take(10)->get();
        $count = $this->count($projects);
        $result = Answer::where('project_id',$request['project_id'])->first();
        $results = $this->results($request['subject_id']);
            if($request['project_id'] == null){
                $project=$projects->first();
            }else{
                $project = Project::where('id',$request['project_id'])->first();
            }
        return view('subject.list',[
            'subject'=>$subject,
            'project' => $project,
            'count' => $count,
            'results' => $results,                                                          
            'result' => $result
        ]);
    }
    
    public function createPage() {
        $subjects = Subject::get();
        return view('subject.create',[
         'subjects'=>$subjects
        ]);
     }   
    
    public function create(CreateRequest $request){
        $project = new Project ();
        $project->subject_id = $request['subjectId'];
        $project->a = $request['a'];
        $project->b = $request['b'];
        $project->c = $request['c'];
        $project->d = $request['d'];
            $destination_path = 'public/images/questions';
            $image = $request['image'];
            $image_name = $image->getClientOriginalName();
            $path = $request['image']->storeAs($destination_path,$image_name);
            $project->question = $image_name;
        try {
            $project->save();
           return redirect()->route('welcome');
        }catch (QueryException $e){
            return response()->json(['error'=>['message'=>$e->getMessage(),'code'=>4551515]],400);
        }
    } 
    
    public function delete($id) {
        $project = Project::where('id',$id)->first();
        $project->delete();
        return redirect()->route('welcome');
     } 
}
