<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use App\Http\Traits\HttpResponses;

use App\Models\Unit as UnitModel;

class UnitController extends Controller
{
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = auth('sanctum')->user();
        
        $items = UnitModel::all();

        return $this->success($items);
    }
}
