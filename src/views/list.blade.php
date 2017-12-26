@extends('btybug::layouts.admin')
@section('content')

    <div role="tabpanel" class="m-t-10" id="main">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main_container_11">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Created date</th>
                    <th>Actions</th>
                </thead>
            </table>
        </div>
    </div>
    @include('resources::assests.magicModal')
@stop
@section('CSS')
@stop
@section('JS')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('postsData') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'description', name: 'description' },
                    { data: 'image', name: 'image' },
                    { data: 'author', name: 'author' },
                    { data: 'status', name: 'status' },
                    { data: 'updated_at', name:'updated_at' },
                    { data: 'actions', name: 'actions' }
                ]
            });
        });
    </script>
@stop