<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresentationRequest;
use App\Presentation;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::all();
        return response()->json($presentations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PresentationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresentationRequest $request)
    {
        $presentation = Presentation::create($request->all());
        return response()->json($presentation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Presentation $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        return response()->json($presentation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PresentationRequest $request
     * @param  Presentation $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(PresentationRequest $request, Presentation $presentation)
    {
        $presentation->update($request->all());
        return response()->json($presentation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Presentation $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        $presentation->delete();
        return response()->json(null,204);
    }
}
