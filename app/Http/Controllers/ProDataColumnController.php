<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProDataColumnRequest;
use App\Http\Requests\UpdateProDataColumnRequest;
use App\Models\ProDataColumn;

class ProDataColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProDataColumnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProDataColumnRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProDataColumn  $proDataColumn
     * @return \Illuminate\Http\Response
     */
    public function show(ProDataColumn $proDataColumn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProDataColumn  $proDataColumn
     * @return \Illuminate\Http\Response
     */
    public function edit(ProDataColumn $proDataColumn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProDataColumnRequest  $request
     * @param  \App\Models\ProDataColumn  $proDataColumn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProDataColumnRequest $request, ProDataColumn $proDataColumn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProDataColumn  $proDataColumn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProDataColumn $proDataColumn)
    {
        //
    }
}
