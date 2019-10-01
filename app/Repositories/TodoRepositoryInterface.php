<?php
namespace App\Repositories;

use App\Todo;
use Illuminate\Database\Eloquent\Builder;

interface TodoRepositoryInterface
{
    public function get(int $todoId): Todo;
    public function all(): Builder;
    public function create(array $todoData): Todo;
    public function update(int $todoId, array $todoData): Todo;
    public function delete(int $todoId): bool;
}
