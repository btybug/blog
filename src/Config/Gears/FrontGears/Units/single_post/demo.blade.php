@php
      $postRepository = new \BtyBugHook\Blog\Repository\PostsRepository();
      $post = $postRepository->first();
      $related = $postRepository->findAllByMultiple(['author_id' => $post->autor_id]);
      $nextPrev = $postRepository->getAllByOrder('desc','created_at');
@endphp

<div class="single-post">
    <article class="single-blog">
        <div class="post-thumb">
            <img src="https://cdn.britannica.com/900x675/80/140480-131-28E57753.jpg" alt="">
        </div>
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                {{--<a href="" class="post-cat">Travel</a>--}}
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="entry-content">
                <p>
                    {{ $post->description }}
                </p>
            </div>

            <div class="post-meta">
                <ul class="pull-left list-inline author-meta">
                    <li class="author">By <a href="#">{{ BBGetUser($post->author_id) }} </a></li>
                    <li class="date"> On {{ BBgetDateFormat($post->created_at) }}</li>
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
            <div class="single-blog-box">
                <a href="#">
                    <img src="https://d1o50x50snmhul.cloudfront.net/wp-content/uploads/2017/07/17153147/gettyimages-590483570.jpg" alt="">
                    <div class="overlay">
                        <div class="promo-text">
                            <p><i class=" pull-left fa fa-angle-left"></i></p>
                            <h5>A Good Thought Never be false</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="single-blog-box">
                <a href="#">
                    <img src="https://www.worldatlas.com/r/w728-h425-c728x425/upload/00/fa/69/shutterstock-450936571.jpg" alt="">
                    <div class="overlay">
                        <div class="promo-text">
                            <p><i class="pull-right fa fa-angle-right"></i></p>
                            <h5>The Reason Why Everyone Love Hill</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="related-post">
        <div class="related-heading">
            <h4>You might also like</h4>
        </div>
        <div class="related-post-items">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="single-item">
                        <a href="#">
                            <img src="https://media2.fdncms.com/stranger/imager/u/large/26041878/1523647161-gettyimages-847218080.jpg" alt="">
                            <h4>Lorem ipsum dolor sit amet,</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="single-item">
                        <a href="#">
                            <img src="https://assets.aucklandzoo.co.nz/assets/media/giraffe-closeup-rectangle.jpg" alt="">
                            <h4>Just Wondering at Beach</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="single-item">
                        <a href="#">
                            <img src="http://cdn.static-economist.com/sites/default/files/lead_2.jpg" alt="">
                            <h4>Nonumy eirmod tempor invidunt</h4>
                        </a>
                    </div>
                </div>
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
