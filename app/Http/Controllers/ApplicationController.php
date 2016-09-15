<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ApplicationRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Hash;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        Application::create([
            'name' => $request->input('name'),
            'key' => Hash::make(crypt_random_string(10)),
            'user_id' => $request->user()->id
        ]);

        flash('Application successfully created!', 'success');

        return redirect('/home');
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

        return view('applications.show', compact('application'));
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

        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ApplicationRequest $request
     * @param Application $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $this->authorize('update', $application);
        $application->update([ 'name' => $request->input('name') ]);

        flash('Application successfully updated!', 'success');

        return redirect('/home');
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
        $application->delete();
    }
}
