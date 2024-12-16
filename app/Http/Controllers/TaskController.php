<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return view("tasks.index",['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'title'=> 'required',
            'description'=>'required'
        ]);
        $data = $request->all();
        $data['completed'] = $request->has('completed') ? 1 : 0;
        Task::create($data);
        return redirect()->route('tasks.index')->with('success','Task created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);   
        return view('tasks.show',['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'title'=> 'required',
            'description'=> 'required'
        ]);
        $data = $request->all();
        $data['completed'] = $request->has('completed') ? 1 : 0;
        Task::find($id)->update($data);
        return redirect()->route('tasks.index')->with('success','Task updated successfully!');
           
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index')->with('success','Task deleted successfully !');
    }
}
