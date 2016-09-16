@extends('layouts.app')

@section('head-style')
    <style>
        .application-key-td {
            width: 100%;
            font-weight: 100;
            font-size: small;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td>
                                    <h4>{{ $application->name }}</h4>
                                </td>
                                <td align="right" class="application-key-td">
                                    {{ $application->key }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="panel-body">
                        <messages :items="{{ $application->messages }}" :appid="{{ $application->id }}"></messages>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
