<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreTaskRequest;
use App\services\ApiResponseFormat;
use App\Models\Task;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $response;
    public function __construct()
    {
        $this->response = new ApiResponseFormat();
    }

    public function index()
    {
        $tasks = Task::paginate(5);
        return $this->response->success($tasks, 'Tasks retrieved successfully');
    }

    public function store(StoreTaskRequest $request)
    {
        $user = auth()->user();
        $task = new Task();
        $task->user_id = $user->id;
        $task->title = $request->validated()['title'];
        $task->description = $request->validated()['description'];
        $task->category_id = $request->validated()['category_id'];
        $task->status = Task::STATUS_PENDING;

        if ($task->save()) {
            return $this->response->success($task, 'Task created successfully');
        } else {
            return $this->response->error('Task could not be created', 500);
        }
    }

    public function update(StoreTaskRequest $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return $this->response->error('Task not found', 404);
        }

        $task->title = $request->validated()['title'];
        $task->description = $request->validated()['description'];

        if ($task->save()) {
            return $this->response->success($task, 'Task updated successfully');
        } else {
            return $this->response->error($task, 'Task could not be updated');
        }
    }

    public function changeStatus(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return $this->response->error('Task not found', 404);
        }

        $task->status = ($task->status == Task::STATUS_PENDING) ? Task::STATUS_COMPLETED : Task::STATUS_PENDING;

        if ($task->save()) {
            return $this->response->success($task, 'Task status updated successfully');
        } else {
            return $this->response->error('Task status could not be updated', 500);
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return $this->response->error('Task not found', 404);
        }

        if ($task->delete()) {
            return $this->response->success($task, 'Task deleted successfully');
        } else {
            return $this->response->error('Task could not be deleted', 500);
        }
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return $this->response->error('Task not found', 404);
        }

        return $this->response->success($task, 'Task retrieved successfully');
    }

    //restore soft deleted task
    public function restore($id)
    {
        $task = Task::withTrashed()->find($id);
        if (!$task) {
            return $this->response->error('Task not found', 404);
        }

        if ($task->restore()) {
            return $this->response->success($task, 'Task restored successfully');
        } else {
            return $this->response->error('Task could not be restored', 500);
        }
    }
}
