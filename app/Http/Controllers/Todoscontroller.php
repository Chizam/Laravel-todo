<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;

class Todoscontroller extends Controller
{
    public function store(){
        
        $request = request();

        $this->validate($request, [
            'title' => 'required|min:5|unique:todos',
            'description' => 'required|max:255'
        ]);

        $todo = new todo;
        $todo->title = $request->title;
        $todo->user_id = auth()->user()->id;
        $todo->description = $request->description;

        $todo->save();
        
        return redirect('/home');
        
    }
    
    public function destroy($id){
        todo::destroy($id);
        return redirect('/home');
    }
    
    public function update($id){
        $todo = todo::find($id);
        return view('update')->with('todo' , $todo);
    }
    
    public function edit(Request $request, $id){
        $todo = todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        return redirect()->back();
        
    }
}

