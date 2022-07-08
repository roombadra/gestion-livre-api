<?php

namespace App\Http\Controllers\API;

use App\Models\Library;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryRequest;
use App\Http\Resources\LibraryResource;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LibraryResource::collection(Library::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $library = Library::create($data);
        return new LibraryResource($library);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        $library->load('categories' , 'books');
        return new LibraryResource($library);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(LibraryRequest $request, Library $library)
    {
        $data['slug'] = Str::slug($request->title);
        $library->update($data);
        return new LibraryResource($library);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $library->delete();
        return response()->json(['message' => 'Library deleted successfully'] , 200);
    }
}
