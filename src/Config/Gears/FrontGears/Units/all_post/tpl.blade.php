@php
    $postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
    $posts = $postRepo->getPublished();
    $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();
@endphp

<section id="blog-section">
    <nav class="navbar bty-navbar-blog">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        @if(isset($settings["custom_sort"]))
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Sort<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">sub 1</a></li>
                                <li><a href="#">sub 2</a></li>
                                <li class="divider"></li>
                                <li><a href="#">sub 3</a></li>
                                <li><a href="#exit">sub 4</a></li>
                            </ul>
                            {{--@if(isset($settings["custom_sort_by"]))
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($settings["custom_sort_by"] as $sort_by)
                                        <li><a href="#">{{$sort_by}}</a></li>
                                    @endforeach
                                </ul>
                            @endif--}}
                        @endif
                    </li>
                    <li>
                        <input name="radionav" type="radio" class="bty-navradio nv-1" id="bty-navradio-1" checked>
                        <label for="bty-navradio-1"></label>
                    </li>
                    <li>
                        <input name="radionav" type="radio" class="bty-navradio nv-2" id="bty-navradio-2">
                        <label for="bty-navradio-2"></label>
                    </li>

                </ul>
                @if(isset($settings["custom_search"]))
                    <form class="navbar-form text-center search-form" role="search">
                        <input type="search" class="form-control" placeholder="Search"/>
                    </form>
                @endif
            </div>
        </div>
    </nav>
    <div class="bty-all-blog">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="col-md-4">
                        <figure class="bty-recent-post-3">
                            <img src="http://avante.biz/wp-content/uploads/Nice-Wallpapers/Nice-Wallpapers-006.jpg" alt="">
                            <div>
                                <span>27</span>
                                <span>Sep</span>
                            </div>
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                            <figcaption>
                                <h3>Title lorem 1 lorem</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.
                                </p>
                                <button>Read More</button>
                            </figcaption>
                            <a href="#"></a>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="bty-recent-post-3">
                            <img src="http://avante.biz/wp-content/uploads/Nice-Wallpapers/Nice-Wallpapers-006.jpg" alt="">
                            <div>
                                <span>27</span>
                                <span>Sep</span>
                            </div>
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                            <figcaption>
                                <h3>Title lorem 1 lorem</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.
                                </p>
                                <button>Read More</button>
                            </figcaption>
                            <a href="#"></a>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="bty-recent-post-3">
                            <img src="http://avante.biz/wp-content/uploads/Nice-Wallpapers/Nice-Wallpapers-006.jpg" alt="">
                            <div>
                                <span>27</span>
                                <span>Sep</span>
                            </div>
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                            <figcaption>
                                <h3>Title lorem 1 lorem</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.
                                </p>
                                <button>Read More</button>
                            </figcaption>
                            <a href="#"></a>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure class="bty-recent-post-3">
                            <img src="http://avante.biz/wp-content/uploads/Nice-Wallpapers/Nice-Wallpapers-006.jpg" alt="">
                            <div>
                                <span>27</span>
                                <span>Sep</span>
                            </div>
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                            <figcaption>
                                <h3>Title lorem 1 lorem</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.
                                </p>
                                <button>Read More</button>
                            </figcaption>
                            <a href="#"></a>
                        </figure>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @if(count($posts))
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-md-4">
                                <aside>
                                    @if(isset($post->image))
                                        <img src="{!! url($post->image) !!}"
                                             class="img-responsive">
                                    @else
                                        <img src="https://s-media-cache-ak0.pinimg.com/originals/2a/f7/2f/2af72f34c04fbf5354c4d637e98969a8.jpg"
                                             class="img-responsive">
                                    @endif
                                    <div class="content-title">
                                        <div class="text-center">
                                            <h3><a href="{{ get_post_url($post->id) }}">{!! $post->title !!}</a></h3>
                                        </div>
                                    </div>
                                    <div class="content-footer">
                                        <img class="user-small-img"
                                             src="{!! url(BBGetUserAvatar($post->author_id)) !!}">
                                        <span style="font-size: 16px;color: #fff;"><a
                                                    href="">{!! BBGetUserName($post->id) !!}</a></span>
                                        <span class="pull-right">
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i
                                                        class="fa fa-comments"></i> 30</a>
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i
                                                        class="fa fa-heart"></i> 20</a>
                                        </span>
                                    </div>
                                </aside>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
{!! BBstyle($_this->path."/css/main.css") !!}