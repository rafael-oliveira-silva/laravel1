<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TasksController extends Controller
{
    public function index(){

        $list = task::all();

        return view('tasks.list', [
            'list' => $list
        ]);
    }

    public function create(){
        return view('tasks.add');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $title = $request->input('title');

        $task = new Task;
        $task->title = $title;
        $task->save();

        return redirect()->route('listTask');
    }

    public function edit($id){
        $data = Task::find($id);

        if($data) {
            return view('tasks.edit', [
                'data' => $data
            ]);
        } else {
            return redirect()->route('listTask');
        }

        return view('tasks.edit');
    }

    public function update(Request $request, $id){
            $request->validate([
                'title' => ['required', 'string']
            ]);

            $title = $request->input('title');

            Task::find($id)->update(['title'=>$title]);

            return redirect()->route('listTask');
        }

    public function destroy($id){
        Task::find($id)->delete();

        return redirect()->route('listTask');
    }

    public function check($id){

        $task = Task::find($id);
        $task->solved = 1 - $task->solved;
        $task->save();

        return redirect()->route('listTask');
    }
}
