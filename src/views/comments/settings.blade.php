@extends('btybug::layouts.admin')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main_container_11">
        <h2>Comment System Control</h2>
        {!! Form::model($data,['class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label>Default Comment Status</label>
                {!! Form::select('status',['unapproved' => 'UnApproved','approved' => 'Approved'],null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop
@section('CSS')
@stop
@section('JS')
    <script>

    </script>
@stop