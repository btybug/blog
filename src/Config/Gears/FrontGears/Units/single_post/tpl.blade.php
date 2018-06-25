@php
    $post = find_post_by_url();
    $postRepository = new \BtyBugHook\Blog\Repository\PostsRepository();
    $related = [];
    $next = null;$prev = null;

    if($post){
        $related = $postRepository->getRelatedPosts($post->author_id);
        $next = $postRepository->getNextPost($post->id);
        $prev = $postRepository->getPreviousPost($post->id);
    }

@endphp

<div class="single-post">
    <article class="single-blog">
        <div class="post-thumb">
            @if($post)
                <img src="{!! url('public/storage/'.$post->image) !!}" alt="">
            @else
                <img src="https://cdn.britannica.com/900x675/80/140480-131-28E57753.jpg" alt="">
            @endif
        </div>
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                {{--<a href="" class="post-cat">Travel</a>--}}
                <h2>{{ @$post->title }}</h2>
            </div>
            <div class="entry-content">
                <p>
                    {{ @$post->description }}
                </p>
            </div>

            <div class="post-meta">
                <ul class="pull-left list-inline author-meta">
                    <li class="author">By <a href="#">{{ BBGetUser(@$post->author_id) }} </a></li>
                    <li class="date"> On {{ BBgetDateFormat(@$post->created_at) }}</li>
                </ul>
                <ul class="pull-right list-inline social-share">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </article>

    <div class="row"><!--blog next previous-->
        <div class="col-md-6">
            @if($prev)
                <div class="single-blog-box">
                    <a href="{{ get_post_url($prev->id) }}">
                        <img src="{!! url('public/storage/'.$prev->image) !!}" alt="">
                        <div class="overlay">
                            <div class="promo-text">
                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                <h5>{{ $prev->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            @if($next)
                <div class="single-blog-box">
                    <a href="{{ get_post_url($next->id) }}">
                        <img src="{!! url('public/storage/'.$next->image) !!}" alt="">
                        <div class="overlay">
                            <div class="promo-text">
                                <p><i class="pull-right fa fa-angle-right"></i></p>
                                <h5>{{ $next->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>


    <div class="related-post">
        <div class="related-heading">
            <h4>You might also like</h4>
        </div>
        <div class="related-post-items">
            <div class="row">
                @if(count($related))
                    @foreach($related as $value)
                        <div class="col-md-4 col-xs-12">
                            <div class="single-item">
                                <a href="{{ get_post_url($value->id) }}">
                                    <img src="{!! url('public/storage/'.$value->image) !!}" alt="">
                                    <h4>{{ $value->title }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-12">
        @if(isset($settings['comment_unit']))
            {!! BBRenderUnits($settings['comment_unit']) !!}
        @endif
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'css.css') !!}
