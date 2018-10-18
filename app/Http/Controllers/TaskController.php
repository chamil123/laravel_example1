<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request){
       // dd($request->all());
       $this->validate($request,[
           'task'=>'required|max:100|min:5',
       ]);
       $task=new Task;
       $task->task=$request->task;
       $task->save();
       $data=Task::all();
    //    dd($data);
      return view('tasks')->with('tasks',$data);
       //return redirect()->back();
    }
    public function updateTaskAsCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();
        return redirect()->back();
       //  $data=Task::all();
        //return view('tasks')->with('tasks',$data);
    }
    public function updateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect()->back();
        // $data=Task::all();
        //return view('tasks')->with('tasks',$data);
    }
    public function deleteTask($id){ 
        $task=Task::find($id);
        $task->delete();
       // $data=Task::all();
        return redirect()->back();
    }
    public function updateTaskview($id){
        $task=Task::find($id);

        return view('updatetask')->with('taskdata',$task);
    }public function updatetask(Request $request){
       $id=$request->id;
       $task=$request->task;
       $data=Task::find($id);
       $data->task=$task;
       $data->save();
       $data=Task::all();
       return view('tasks')->with('tasks',$data);
    }
}
