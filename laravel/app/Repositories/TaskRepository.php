<?php

namespace App\Repositories;
use App\Models\Task;
use Illuminate\Http\Request;

interface TaskRepository
{
    public function getTasks(): array;
    public function getTask(string $taskDescription): ?Task;
    public function create(Request $request): void;
    public function delete(int $taskID): void;
    public function updateTime(Task $task, Request $request): void;
}