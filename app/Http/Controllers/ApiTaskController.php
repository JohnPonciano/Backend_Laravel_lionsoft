<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// ...

class ApiTaskController extends Controller
{
    // ...

    public function index()
    {
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return response()->json(['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable',
        ]);

        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->completed = $request->input('completed', false);
        $todo->user_id = Auth::user()->id;
        $todo->save();

        return response()->json(['message' => 'Task created successfully']);
    }

    public function show($id)
    {
        $todo = Todo::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return response()->json(['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable',
        ]);

        $todo = Todo::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->completed = $request->input('completed', false);
        $todo->save();

        return response()->json(['message' => 'Task updated successfully']);
    }

    public function destroy($id)
    {
        $todo = Todo::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $todo->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
