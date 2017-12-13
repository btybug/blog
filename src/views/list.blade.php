@extends('btybug::layouts.admin')
@section('content')
    <div role="tabpanel" class="m-t-10" id="main">
        <div class="col-md-12 m-b-10">
            <a href="{!! route('form_builder_blog') !!}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> New Form</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main_container_11">
            <table class="table table-bordered" id="tpl-table">
                <thead>
                <tr class="bg-black-darker text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Shortcode</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Created date</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <th>Create Post</th>
                    <th>create_post</th>
                    <th>[form id=1] or [form slug=create_post]</th>

                    <th>{{ BBGetUser(Auth::id()) }}</th>
                    <th>Active</th>
                    <th>11.12.2017</th>
                    <th>
                        <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
                <tr>
                    <th>2</th>
                    <th>Edit Post</th>
                    <th>edit_post</th>
                    <th>[form id=2] or [form slug=edit_post]</th>

                    <th>{{ BBGetUser(Auth::id()) }}</th>
                    <th>Active</th>
                    <th>13.12.2017</th>
                    <th>
                        <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
                {{--@if(count($posts))--}}
                    {{--@foreach($posts as $post)--}}
                        {{--<tr>--}}
                            {{--<th>{{ $post->title }}</th>--}}
                            {{--<th>{{ $post->description }}</th>--}}
                            {{--<th width="100px">--}}
                                {{--<img src="{!! url($post->image) !!}" class="img-responsive">--}}
                            {{--</th>--}}
                            {{--<th>{{ BBGetUser($post->author_id) }}</th>--}}
                            {{--<th>{{ $post->status }}</th>--}}
                            {{--<th>{{ BBgetDateFormat($post->created_at) }}</th>--}}
                            {{--<th>--}}
                                {{--<a href="{!! url("admin/blog/edit-post",$post->id) !!}" class="btn btn-warning"><i class="fa fa-edit"></i></a>--}}
                            {{--</th>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--@else--}}
                    {{--<tr>--}}
                        {{--<th  colspan="7" class="text-center">--}}
                            {{--No Forms--}}
                        {{--</th>--}}
                    {{--</tr>--}}
                {{--@endif--}}
                </tbody>
            </table>
        </div>
    </div>
    @include('resources::assests.magicModal')
@stop
@section('CSS')
@stop
@section('JS')
@stop