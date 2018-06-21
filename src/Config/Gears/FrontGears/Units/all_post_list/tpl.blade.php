@php
    $repo = new \BtyBugHook\Blog\Repository\PostsRepository();
    $posts = (Auth::check()) ? $repo->findAllByMultiple(['author_id'=>Auth::id()]) : [];
@endphp
<div class="all-post-list">
    <div class="text-right">
        <button class="btn btn-info"><i class="fa fa-plus"></i></button>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th class="images">Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @if(count($posts))
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td class="images"><img src="https://www.studyabroad.com/sites/default/files/images/Nice-France-Study-Abroad-Programs.jpg" alt=""></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->status }}</td>
                        <td class="td-edit-delete">
                            <div class="edit-delete">
                                <a href="{!! url('my-account/my-posts/'.$post->id) !!}" class="btn btn-warning bt-sm"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-danger bt-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
{!! BBstyle($_this->path."/css/main.css") !!}