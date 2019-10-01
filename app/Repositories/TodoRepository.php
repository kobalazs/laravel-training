<?php
namespace App\Repositories;

use App\Todo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TodoRepository implements TodoRepositoryInterface
{
    public function get(int $todoId): Todo
    {
        return Todo::findOrFail($todoId);
    }

    public function all(): Builder
    {
        return Auth::user()
            ->todos()
            ->orderBy('created_at', 'desc')
            ->getQuery();
    }

    public function create(array $todoData): Todo
    {
        $todo = new Todo($todoData);
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return $todo;
    }

    public function update(int $todoId, array $todoData): Todo
    {
        $todo = Todo::find($todoId);
        $todo->fill($todoData);
        $todo->save();
        return $todo;
    }

    public function delete(int $todoId): bool
    {
        return Todo::destroy($todoId) === 1;
    }
}
