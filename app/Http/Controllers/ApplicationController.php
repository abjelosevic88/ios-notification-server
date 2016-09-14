<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApplicationController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $this->authorize('view', $application);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $this->authorize('view', $application);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Application $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
    }
}
