@php
    $post = find_post_by_url();
@endphp
<section id="single-post">
    <div class="col-md-10 blogShort">
        @if($post)
            <h1>{{ $post->title }} <span class="pull-right">{!! BBGetUser($post->author_id) .", ". BBgetDateFormat($post->created_at) !!}</span></h1>
            <img src="{!! url($post->image) !!}" alt="post img"
                 class="pull-left img-responsive postImg img-thumbnail margin10">
            <article>
                {{ $post->description }}
            </article>
        @else
            No Posts
        @endif
    </div>
</section>

<style>
    .single-post .blogShort {
        border-bottom: 1px solid #ddd;
    }

    .single-post .add {
        background: #333;
        padding: 10%;
        height: 300px;
    }

    .single-post .btn-blog {
        color: #ffffff;
        background-color: #37d980;
        border-color: #37d980;
        border-radius: 0;
        margin-bottom: 10px
    }

    .single-post .btn-blog:hover,
    .single-post .btn-blog:focus,
    .single-post .btn-blog:active,
    .single-post .btn-blog.active,
    .single-post .open .dropdown-toggle.btn-blog {
        color: white;
        background-color: #34ca78;
        border-color: #34ca78;
    }

    .single-post article h2 {
        color: #333333;
    }

    .single-post h2 {
        color: #34ca78;
    }

    .single-post .margin10 {
        margin-bottom: 10px;
        margin-right: 10px;
    }
</style>