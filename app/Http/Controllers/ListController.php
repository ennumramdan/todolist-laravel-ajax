<?php

namespace App\Http\Controllers;
use App\Todo;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){
        $todos = Todo::where('status', 0)->get();
        $dones = Todo::where('status', 1)->get();

        return view('todolist', [
            'todos' => $todos,
            'dones' => $dones
        ]);
    }

    public function create(Request $request){
        $todo = new Todo;
        $todo->title = $request->text;
        $todo->save();
        return "Done";
    }

    public function update(Request $request){
        $todo = Todo::find($request->id);

        if ($request->title)
            $todo->title = $request->title;

        if ($request->status)
            $todo->status = $request->status;

        $todo->save();
        return "todolist updated";
    }


    public function delete(Request $request){
        $todo = Todo::where('id', $request->id);
        $todo->delete();
        return "todolist deleted";
    }

    public function search(Request $request){
        $term = $request->term;
        $todos = Todo::where("item" , "LIKE" , "%". $term . "%")->get();
        if(count($todos)  == 0){
            $searchResult[] = "No Items found";
        }else{
            foreach($todos as $key => $value){
                $searchResult[] = $value->item;
            }
        }
        return $searchResult;

    }
}