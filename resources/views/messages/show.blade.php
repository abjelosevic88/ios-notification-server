@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $message->title }}

                        <div class="pull-right">
                            {{ $message->publish_date }}
                        </div>
                    </div>
                    <div class="panel-body">
                        {{ $message->message }}

                        <div class="pull-right">
                            <a href="{{ url('/messages/' .
                                        $message->id .
                                        '/edit?application_id='.
                                        $message->application->id) }}"
                               type="button"
                               class="btn btn-default"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Edit Message">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
