@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $application->name }}
                        <h4><strong>Key:</strong> {{ $application->key }}</h4>
                    </div>
                    <div class="panel-body">
                        <messages :items="{{ $application->messages }}" :appid="{{ $application->id }}"></messages>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
