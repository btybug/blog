@extends('btybug::layouts.admin')

@section('content')
    <div class="col-md-8">
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <h2>Create post</h2>
        </div>
        <div class="row">
            {!! Form::open(['files' => true]) !!}
            <div class="form-group col-md-12">
                <label class="col-md-2 control-label" for="title">Post title</label>
                <div class="col-md-6">
                    {!! Form::text('title',null,['class' => 'form-control input-md','placeholder' => 'Enter Post title']) !!}
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-2 control-label" for="post-desc">Post Description</label>
                <div class="col-md-6">
                    {!! Form::textarea('description',null,['id' => 'post-desc','class' => 'form-control input-md','placeholder' => 'Enter Post Description']) !!}
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-2 control-label" for="post-desc">Post Image</label>
                <div class="col-md-6">
                    {!! BBmediaButton('image') !!}
                </div>
            </div>

            <div class="form-group col-md-12">
                <label class="col-md-2 control-label" for="post-desc">Post Status</label>
                <div class="col-md-6">
                    {!! Form::select('status',['draft' => 'Draft','pending' => 'Pending','published' => 'Published'],null,['class' => 'form-control input-md']) !!}
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-8">
                    {!! Form::submit("Save",['class' => 'btn btn-primary pull-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('CSS')
@stop
@section('JS')
    {!! HTML::script('/js/tinymice/tinymce.min.js') !!}
    <script>
//        tinymce.init({
//            selector: '#post-desc', // change this value according to your HTML
//            height: 200,
//            theme: 'modern',
//            plugins: [
//                'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullpage fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
//            ],
//            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
//            image_advtab: true
//        });
    </script>
@stop