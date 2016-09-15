@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Application</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($application, [
                            'method' => 'PUT',
                            'url' => url('applications/' . $application->id),
                            'class' => 'form-horizontal' ]) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name:', [ 'class' => 'col-sm-2 control-label' ]) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Update</button>
                                    </div>
                                </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
