<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

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

    public function store(StoreTodoRequest $request)
    {
        $request->user()->todos()->create($request->validated());

        return redirect()->route('app.index');
    }

    public function markAsCompleted(Request $request, Todo $todo)
    {
        if ($request->user()->id !== $todo->user_id) {
            abort(403);
        }

        $todo->update([
            'is_completed' => true,
        ]);

        return redirect()->route('app.index');
    }

    public function destroy(Request $request, Todo $todo)
    {
        if ($request->user()->id !== $todo->user_id) {
            abort(403);
        }

        $todo->delete();

        return redirect()->route('app.index');
    }
}
