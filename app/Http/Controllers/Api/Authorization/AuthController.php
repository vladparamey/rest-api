<?php


namespace App\Http\Controllers\Api\Authorization;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->data());

        return Response::json(['token' => $user->createToken(env('APP_NAME'))->plainTextToken]);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->data())) {
            /** @var User $user */
            $user = Auth::user();

            return Response::json(['token' => $user->createToken(env('APP_NAME'))->plainTextToken]);
        }

        return Response::json(['token' => 'Unauthorized'], 403);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        return Response::json([]);
    }
}
