@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $application->name }}
                        <h4><strong>Key:</strong> {{ $application->key }}</h4>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
