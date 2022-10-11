<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProTransactionRequest;
use App\Http\Requests\UpdateProTransactionRequest;
use App\Models\ProTransaction;

class ProTransactionController extends Controller
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
     * @param  \App\Http\Requests\StoreProTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProTransaction  $proTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(ProTransaction $proTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProTransaction  $proTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProTransaction $proTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProTransactionRequest  $request
     * @param  \App\Models\ProTransaction  $proTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProTransactionRequest $request, ProTransaction $proTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProTransaction  $proTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProTransaction $proTransaction)
    {
        //
    }
}
