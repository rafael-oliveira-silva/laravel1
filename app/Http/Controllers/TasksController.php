<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){

        $list = DB::select('SELECT * FROM tasks');

        return view('tasks.list', [
            'list' => $list
        ]);
    }

    public function create(){
        return view('tasks.add');
    }

    public function store(Request $request){
        if($request->filled('title')){
            $title = $request->input('title');

            DB::insert('INSERT INTO tasks (title) VALUES (:title)', [
               'title'  => $title
            ]);

            return redirect()->route('listTask');
        } else {
            return redirect()->route('createTask')
            ->with('warning', 'Você não preencheu o título');
        }
    }

    public function edit(){
        return view('tasks.edit');
    }

    public function update(){
        
    }

    public function destroy(){
        
    }

    public function check(){
        
    }
}
