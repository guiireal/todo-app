<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertTodoRequest;
use App\Models\Todo;

class AppController extends Controller
{
    public function index()
    {
        return inertia('App', [
            'todos' => auth()->user()
                ->todos()
                ->orderBy('created_at', 'desc')
                ->get(),
        ]);
    }

    public function getAll()
    {
        return response()->json(
            auth()->user()
                ->todos()
                ->orderBy('created_at', 'desc')
                ->get()
        );
    }

    public function store(UpsertTodoRequest $request)
    {
        $request->user()->todos()->create($request->validated());

        return redirect()->route('app.index');
    }

    public function update(UpsertTodoRequest $request, Todo $todo)
    {
        if ($request->user()->id !== $todo->user_id) {
            abort(403);
        }

        $todo->update($request->validated());

        return redirect()->route('app.index');
    }
}
