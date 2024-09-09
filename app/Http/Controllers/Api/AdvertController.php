<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertRequest;
use App\Http\Resources\AdvertResource;
use App\Models\Advert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;

class AdvertController extends Controller
{
    /**
     * Get a paginated list of adverts.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $query = Advert::query();

        $sortBy = $request->input('sort_by', 'created_at');
        $sortDirection = $request->input('sort_direction', 'asc');

        $validSortByFields = ['price', 'created_at'];
        $validSortDirections = ['asc', 'desc'];

        if (in_array($sortBy, $validSortByFields) && in_array($sortDirection, $validSortDirections)) {
            $query->orderBy($sortBy, $sortDirection);
        }

        $adverts = $query->paginate(10);

        return AdvertResource::collection($adverts);
    }

    /**
     * Get a specific advert.
     *
     * @param Request $request
     * @param int $id
     * @return AdvertResource
     */
    public function show(Request $request, $id)
    {
        $advert = Advert::findOrFail($id);

        return new AdvertResource($advert);
    }

    /**
     * Create a new advert.
     *
     * @param AdvertRequest $request
     * @return JsonResponse
     */
    public function store(AdvertRequest $request)
    {
        try {
            $advert = new Advert();
            $advert->fill($request->validated());
            $advert->save();

            return response()->json([
                'id' => $advert->id,
                'message' => 'Advert created successfully',
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ]);
        }

    }

}
