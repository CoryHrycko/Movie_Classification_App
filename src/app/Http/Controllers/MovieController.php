<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Movie::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MovieStoreRequest  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(MovieStoreRequest $request)
    {
        $movie = Movie::create($request->validated());
        return response()->json($movie, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $movie->update($request->validated());
        return response()->json($movie, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(Response::HTTP_ACCEPTED);
    }
}
