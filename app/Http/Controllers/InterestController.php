<?php

namespace App\Http\Controllers;

use App\Http\Requests\Interest\InterestRequest;
use App\Http\Resources\InterestResource;
use App\Models\Interest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;

/**
 * Class InterestController
 * @package App\Http\Controllers
 */
class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return InterestResource::collection(Interest::with(['category', 'user'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InterestRequest $request
     * @return InterestResource
     */
    public function store(InterestRequest $request): InterestResource
    {
        return new InterestResource(Interest::create($request->data()));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return InterestResource
     */
    public function show(int $id): InterestResource
    {
        return new InterestResource(Interest::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InterestRequest $request
     * @param Interest $interest
     * @return InterestResource
     */
    public function update(InterestRequest $request, Interest $interest): InterestResource
    {
        $interest->update($request->data());

        return new InterestResource($interest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Interest $interest
     * @return JsonResponse
     */
    public function destroy(Interest $interest): JsonResponse
    {
        $interest->delete();

        return Response::json([]);
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function search(Request $request): AnonymousResourceCollection
    {
        return InterestResource::collection(Interest::where('name', 'like', '%' . ($request->get('search') ?? '') . '%')
            ->with(['category', 'user'])
            ->get());
    }
}
