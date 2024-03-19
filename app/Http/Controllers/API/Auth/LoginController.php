<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AuthRequest;
use App\Http\Traits\HttpResponses;

use App\Constants\AuthConstants;

use Carbon\Carbon;
use Exception;

class LoginController extends Controller
{
    use HttpResponses;

    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request): JsonResponse
    {
        if (auth()->attempt($request->all())) {
            $user = auth('sanctum')->user();
            $user->tokens()->delete();

            try{
                $expirationDateTime = Carbon::now()->addMinutes(config('sanctum.expiration'));
                $newToken = $user->createToken(config('app.name'));
                
                $token = $newToken->plainTextToken;
            }catch(Exception $e){
                return $this->error(null, $e->getMessage());
            }

            $data = [
                'token' => $token,
                'expires_at' => $newToken->accessToken->expires_at,
                'name' => $user->name
            ];

            return $this->success($data, AuthConstants::LOGIN);
        }

        return $this->error([], AuthConstants::VALIDATION);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $user = auth('sanctum')->user();

        try{
            $user->tokens()->delete();
        }catch(Exception $e){
            return $this->error(null, $e->getMessage());
        }

        return $this->success(null, AuthConstants::LOGOUT);
    }
}
