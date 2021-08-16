<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Facade\FlareClient\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

 
    public function index(): ViewView
    {
        return view('index');
    }

    public function getTasks(): array
    {
        return $this->taskRepository->getTasks();
    }

    public function store(Request $request): void
    {
        $existentTask = $this->taskRepository->getTask($request->taskDescription);
        
        if(is_null($existentTask)){
            $this->taskRepository->create($request);
        } else {
            $this->taskRepository->updateTime($existentTask, $request);
        }
    }

    public function delete(int $taskID): void
    {
        $this->taskRepository->delete($taskID);
    }
}
