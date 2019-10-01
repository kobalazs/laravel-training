<?php
namespace App\Repositories;

use App\Todo;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Database\Eloquent\Builder;

class TodoRepository implements TodoRepositoryInterface
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function get(int $todoId): Todo
    {
        return Todo::findOrFail($todoId);
    }

    public function all(): Builder
    {
        return $this->auth
            ->user()
            ->todos()
            ->orderBy('created_at', 'desc')
            ->getQuery();
    }

    public function create(array $todoData): Todo
    {
        $todo = new Todo($todoData);
        $todo->user_id = $this->auth->user()->id;
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
