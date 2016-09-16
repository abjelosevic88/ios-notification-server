<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\MessageRequest;
use App\Transformers\MessageTransformer;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests;
use Illuminate\Validation\UnauthorizedException;

class MessageController extends ApiController
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $application_id = $request->input('application_id');

        return view('messages.create', compact('application_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $this->isAuthorizedToAccessApplication($request);
        Message::create($request->except('_token'));

        flash('Message successfully created!', 'success');

        return redirect('/applications/' . $request->input('application_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $this->authorize('view', $message);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Message $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Message $message)
    {
        $this->authorize('view', $message);
        $application_id = $request->input('application_id');

        return view('messages.edit', compact('message', 'application_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessageRequest $request
     * @param Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Message $message)
    {
        $this->authorize('update', $message);
        $message->update($request->only([ 'title', 'message', 'publish_date' ]));

        flash('Message successfully updated!', 'success');

        return redirect('/applications/' . $request->input('application_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);
        $message->delete();
    }

    /**
     * Checks if user is authorized to access application.
     *
     * @param MessageRequest $request
     */
    private function isAuthorizedToAccessApplication(MessageRequest $request)
    {
        $application = Application::find($request->input('application_id'));

        if ($application->user_id !== $request->user()->id) {
            throw new UnauthorizedException;
        }
    }
}
