<?php
namespace App\Repositories;

use App\Repositories\TaskRepository;
use App\Models\Task;
use Illuminate\Http\Request;

class EloquentTaskRepository implements TaskRepository {

    public function getTasks(): array 
    {
        return Task::all()->toArray();
    }

    public function getTask(string $taskDescription): ?Task 
    {
        return Task::firstwhere('description', $taskDescription);
    }

    public function create(Request $request): void
    {
        $task = Task::create([
            "description" => $request->taskDescription,
            "time_spent" => $request->totalSeconds
        ]);

        $task->save();
    }

    public function delete(int $taskID): void
    {
        $task = Task::where('id', $taskID);

        $task->delete();
    }

    public function updateTime(Task $task, Request $request): void
    { 
        $task->time_spent += $request->totalSeconds;

        $task->save();
    }
}