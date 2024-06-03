<?php

namespace App\Http\Controllers;

use App\recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('recommendations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function show(recommendation $recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(recommendation $recommendation)
    {
        //
    }
}
