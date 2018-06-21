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
    <div class="top-comment"><!--top comment-->
        <img src="https://files.brightside.me/files/news/part_39/398660/17068260-26730710-01finished-0-1510496576-1510496592-2000-1-1510496592-650-04f9ebaa03-1510932288.jpg" class="pull-left img-circle" alt="">
        <h4><a href="">Ricard Goff</a></h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
            invidunt ut labore et dolore magna aliquyam erat.</p>
        <ul class="list-inline social-share">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-pinterest"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            <li><a href=""><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>

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

    <div class="comment-area">
        <div class="comment-heading">
            <h3>3 Thoughts</h3>
        </div>
        <div class="single-comment">
            <div class="media">
                <div class="media-left text-center">
                    <a href=""><img class="media-object" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt=""></a>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h3 class="text-uppercase">
                            <a href="">John Smith</a>
                            <a href="" class="pull-right reply-btn">reply</a>
                        </h3>
                    </div>
                    <p class="comment-date">
                        December, 02, 2017 at 5:57 PM
                    </p>
                    <p class="comment-p">
                        Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sdiam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                        gubergren, no sea takimata sanctus est.
                    </p>
                </div>
            </div>
        </div>
        <div class="single-comment single-comment-reply">
            <div class="media">
                <div class="media-left text-center">
                    <a href=""> <img class="media-object" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt=""></a>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h3 class="text-uppercase"><a href="">Joan Coal</a></h3>
                    </div>
                    <p class="comment-date">
                        2 days ago
                    </p>
                    <p class="comment-p">
                        Labore et dolore magna aliquyam erat, sdiam voluptua. At vero eos eaccusam et justo
                        duo dolores et ea rebum. Stet clita kasd.
                    </p>
                </div>
            </div>
        </div>
        <div class="single-comment">
            <div class="media">
                <div class="media-left text-center">
                    <a href=""> <img class="media-object" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt=""></a>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h3 class="text-uppercase"><a href="">Ricard Goff</a> <a href="" class="pull-right reply-btn">reply</a>
                        </h3>
                    </div>
                    <span class="comment-date"> 5 hours ago</span>
                    <p class="comment-p">
                        Amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidu labore et
                        dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et usto duo
                        dolores et ea rebum.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="leave-comment">
        <h4>Leave a reply</h4>
        <form class="form-horizontal contact-form" method="" action="#">
            <div class="form-group">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Website url">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea class="form-control" rows="6" name="message" placeholder="Write Massage" required=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn send-btn">Post Comment</button>
        </form>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'css.css') !!}
