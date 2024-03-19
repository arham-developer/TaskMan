<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use App\Http\Traits\HttpResponses;
use App\Http\Requests\TaskRequest;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = auth('sanctum')->user();
        $query = Task::query()->whereNull('parent_id');

        if($user->is_admin){
            $items = $query->get();
        }elseif($user->is_guest){
            $items = $query->whereUserId($user->id)->whereIsPublic(true)->get();
        }else{ // task of user only
            $items = $query->whereUserId($user->id)->get();
        }

        $collection = TaskResource::collection($items);

        return $this->success($collection);
    }

    /**
     * @return JsonResponse
     */
    public function subTask(string $taskId): JsonResponse
    {
        try{
            $task = Task::findOrFail($taskId);
        }catch(Exception $e) {
            return $this->error($e->getMessage(), 'Error on retrieve item by ID');
        }

        $items = Task::whereParentId($task->id)->get();

        $collection = TaskResource::collection($items);

        return $this->success($collection);
    }

    /**
     * @return JsonResponse
     */
    public function create(TaskRequest $request): JsonResponse
    {
        $user = auth('sanctum')->user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['priority'] = array_search($request->priority, [1 => 'high', 'medium', 'low']);

        if($request->filled('parent_id')) {
            try{
                $input['parent_id'] = Task::findOrFail($request->parent_id)->id;
            }catch(Exception $e) {
                return $this->error($e->getMessage(), 'Error on retrieve item by ID');
            }
        }

        try{
            Task::create($input);
        }catch(Exception $e) {
            return $this->error($e->getMessage(), 'Error on create task');
        }

        return $this->success('Task successfully created');
    }

    /**
     * @return JsonResponse
     */
    public function update(TaskRequest $request, string $taskId): JsonResponse
    {
        $user = auth('sanctum')->user();

        try{
            $task = Task::findOrFail($taskId);
        }catch(Exception $e) {
            return $this->error($e->getMessage(), 'Error on retrieve item by ID');
        }

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['priority'] = array_search($request->priority, [1 => 'high', 'medium', 'low']);

        if($request->filled('parent_id')) {
            try{
                $input['parent_id'] = Task::findOrFail($request->parent_id)->id;
            }catch(Exception $e) {
                return $this->error($e->getMessage(), 'Error on retrieve item by ID');
            }
        }

        try{
            $task->update($input);
        }catch(Exception $e) {
            return $this->error($e->getMessage(), 'Error on update task');
        }

        return $this->success('Task successfully updated');
    }


    /**
     * @return JsonResponse
     */
    public function destroy(string $taskId): JsonResponse
    {
        $user = auth('sanctum')->user();
        
        try{
            $task = Task::findOrFail($taskId);
        }catch(Exception $e) {
            return $this->error($e->getMessage(), 'Error on retrieve item by ID');
        }

        $task->delete();

        return $this->success('Task successfully deleted');
    }
}
