<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:tasks|max:255',
            'due_date' => 'required|date|after:today',
            'description' => 'nullable',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }


    if ($request->has('due_date_start') && $request->has('due_date_end')) {
        $startDate = $request->input('due_date_start');
        $endDate = $request->input('due_date_end');
        $query->whereBetween('due_date', [$startDate, $endDate]);
    }


        if ($request->has('search')) {
            $query->where('title', 'LIKE', '%' . $request->input('search') . '%');
        }

        return response()->json($query->paginate(10));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:tasks,title,' . $id,
            'due_date' => 'required|date|after:today',
            'description' => 'nullable',
            'status' => 'in:pending,completed',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
