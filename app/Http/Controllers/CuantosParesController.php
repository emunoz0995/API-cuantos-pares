<?php

namespace App\Http\Controllers;

use App\Models\CuantosPares;
use Illuminate\Http\Request;

class CuantosParesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pares = CuantosPares::with('visitors')->get();
        return response()->json($pares);
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
     * @param  \App\Models\CuantosPares  $cuantosPares
     * @return \Illuminate\Http\Response
     */
    public function show(CuantosPares $cuantosPares)
    {
        //
        return response()->json($visitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CuantosPares  $cuantosPares
     * @return \Illuminate\Http\Response
     */
    public function edit(CuantosPares $cuantosPares)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CuantosPares  $cuantosPares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuantosPares $cuantosPares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CuantosPares  $cuantosPares
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuantosPares $cuantosPares)
    {
        //
    }
}
