<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Illuminate\Database\QueryException;

class ProjectController extends Controller
{
    public function createPage() {
        $subjects = Subject::get();
        return view('subject.create',[
         'subjects'=>$subjects
        ]);
     }
    public function listPage($id) {
        $list = Subject::where('id',$id)->with('projects')->first();
        $projects=$list->projects()->paginate(1);
        //dd($projects);
        return view('subject.list',[
         'list'=>$list,
         'projects'=>$projects,
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









    
}
