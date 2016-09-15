@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <applications :items="{{ Auth::user()->applications }}"></applications>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
