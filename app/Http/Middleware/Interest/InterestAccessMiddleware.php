<?php

namespace App\Http\Middleware\Interest;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class InterestAccessMiddleware
 * @package App\Http\Middleware
 */
class InterestAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        if ($request->route('interest')->user_id === Auth::id()) {
            return $next($request);
        }

        return response()->json([], 403);
    }
}
