<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        #dd("new task");
	return view('tasks.add', [
            'task' => new Task(),
        ]);
    }

    /**
     * Store a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:1024',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

	#Session::flash('flash_message', 'Task successfully added!');

        return redirect('/tasks');
    }

    /**
     * Update a task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:1024',
        ]);
        $task = Task::findOrFail($task->id);
        $input = $request->all();
	$task->fill($input);
        $task->save();

	#Session::flash('flash_message', 'Task successfully updated!');

        return redirect('/tasks');
    }

    /**
     * Show the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function show(Request $request, Task $task)
    {
	#dd($request->all());

        return view('tasks.show', [
            'task' => $task,
        ]);
    }
    
    /**
     * Edit the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function edit(Request $request, Task $task)
    {
	#dd($request->all());

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    
    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
