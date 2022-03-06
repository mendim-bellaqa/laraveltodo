<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    public function index(){

    if(Auth::check())
    {
        $tasks = auth()->user()->tasks();
        return view('dashboard', compact('tasks'));
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
    	$task = new Task();
        $task->title = $request->title;
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('/dashboard');
    }

    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {
                return view('edit', compact('task'));
        }
        else {
             return redirect('/dashboard');
         }
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$task->description = $request->description;
	    	$task->save();
	    	return redirect('/dashboard');
    	}
    }
}
