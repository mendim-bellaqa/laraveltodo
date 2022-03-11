<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    public function index(){

    if(Auth::check())
    {
        $todos = auth()->user()->todos();
        return view('welcome', compact('todos'));
    }

        return Redirect::route('login')->withInput()->with('errmessage', 'Please Login to access restricted area.');

    }

    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
    	$todo = new Todo();
        $todo->title = $request->title;
    	$todo->description = $request->description;
    	$todo->user_id = auth()->user()->id;
    	$todo->save();

        return redirect('/')->with('status', 'To Do added successfully.');
    }

    public function edit(Todo $todo)
    {

    	if (auth()->user()->id == $todo->user_id)
        {
                return view('edit', compact('todo'));
        }
        else {
            return redirect('/')->with('status', 'To Do updated successfully.');
         }
    }

    public function update(Request $request, Todo $todo)
    {
    	if(isset($_POST['delete'])) {
    		$todo->delete();
            return redirect('/')->with('status', 'To Do deleted successfully.');
    	}
    	else
    	{
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required'
            ]);
            $todo->title = $request->title;
    		$todo->description = $request->description;
	    	$todo->save();
            return redirect('/')->with('status', 'To Do updated successfully.');
    	}
    }
}
