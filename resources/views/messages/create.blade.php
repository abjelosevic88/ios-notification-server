@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Message</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open([ 'url' => url('messages'), 'class' => 'form-horizontal' ]) !!}
                            <div class="form-group">
                                {!! Form::label('title', 'Title:', [ 'class' => 'col-sm-2 control-label' ]) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('title', null, [ 'class' => 'form-control' ]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('message', 'Message:', [ 'class' => 'col-sm-2 control-label' ]) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('message', null, [ 'class' => 'form-control' ]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('publish_date', 'Publish Date:', [ 'class' => 'col-sm-2 control-label' ]) !!}
                                <div class="col-sm-10">
                                    {!! Form::date('publish_date', null, [ 'class' => 'form-control' ]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Create</button>
                                </div>
                            </div>

                            {!! Form::hidden('application_id', $application_id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
