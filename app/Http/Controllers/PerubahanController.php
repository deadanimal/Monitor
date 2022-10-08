<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerubahanRequest;
use App\Http\Requests\UpdatePerubahanRequest;
use App\Models\Perubahan;

class PerubahanController extends Controller
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
     * @param  \App\Http\Requests\StorePerubahanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerubahanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perubahan  $perubahan
     * @return \Illuminate\Http\Response
     */
    public function show(Perubahan $perubahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perubahan  $perubahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perubahan $perubahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerubahanRequest  $request
     * @param  \App\Models\Perubahan  $perubahan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerubahanRequest $request, Perubahan $perubahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perubahan  $perubahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perubahan $perubahan)
    {
        //
    }
}
