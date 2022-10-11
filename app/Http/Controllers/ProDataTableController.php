<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProDataTableRequest;
use App\Http\Requests\UpdateProDataTableRequest;
use App\Models\ProDataTable;

class ProDataTableController extends Controller
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
     * @param  \App\Http\Requests\StoreProDataTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProDataTableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProDataTable  $proDataTable
     * @return \Illuminate\Http\Response
     */
    public function show(ProDataTable $proDataTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProDataTable  $proDataTable
     * @return \Illuminate\Http\Response
     */
    public function edit(ProDataTable $proDataTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProDataTableRequest  $request
     * @param  \App\Models\ProDataTable  $proDataTable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProDataTableRequest $request, ProDataTable $proDataTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProDataTable  $proDataTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProDataTable $proDataTable)
    {
        //
    }
}
