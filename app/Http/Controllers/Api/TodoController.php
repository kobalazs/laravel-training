<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TodoRepositoryInterface;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        Auth::shouldUse('api');
        $this->authorizeResource(Todo::class, 'todo');
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        return $this->todoRepository->all()->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
        ]);

        $this->todoRepository->create($validatedData);

        return redirect('todo');
    }

    public function show(Todo $todo)
    {
        return $todo;
    }

    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
        ]);

        return $this->todoRepository->update($todo->id, $validatedData);
    }

    public function destroy(Todo $todo)
    {
        return ['success' => $this->todoRepository->delete($todo->id)];
    }
}
