@php
    $postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
    $posts = $postRepo->paginationSettings($settings);
    $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();

    $col_md_x = "col-md-4";
    if (isset($settings["grid_system"]) && $settings["grid_system"] == 'list'){
        $col_md_x = "col-md-12";
    }
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

                            @if(isset($settings["custom_sort_by"]))
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($settings["custom_sort_by"] as $sort_by)
                                        <li><a href="#">{{$sort_by}}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        @endif
                    </li>
                    <li>
                        <input name="radionav" type="radio" class="bty-navradio nv-1 custom_grid_change" value="list"
                               id="bty-navradio-1" {{ (isset($settings["grid_system"]) && $settings["grid_system"] == 'list') ? "checked" : ""}}>
                        <label for="bty-navradio-1"></label>
                    </li>
                    <li>
                        <input name="radionav" type="radio" class="bty-navradio nv-2 custom_grid_change" value="grid"
                               id="bty-navradio-2" {{ (isset($settings["grid_system"]) && $settings["grid_system"] == 'grid') ? "checked" : ""}} {{ !isset($settings["grid_system"])? "checked" : "" }}>
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
                @if(count($posts))
                    <ul class="custom_append_post">
                        @foreach($posts as $post)
                            <li class="{{$col_md_x}}">
                                <figure class="bty-recent-post-3">
                                    @if(!isset($post->image))
                                        <img src="{!! url($post->image) !!}" class="img-responsive">
                                    @else
                                        <img src="http://avante.biz/wp-content/uploads/Nice-Wallpapers/Nice-Wallpapers-006.jpg"
                                             alt="">
                                    @endif
                                    <div>
                                        <span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->created_at)->format('d')}}</span>
                                        <span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->created_at)->format('M')}}</span>
                                    </div>
                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                    <figcaption>
                                        <h3>{!! $post->title !!}</h3>
                                        <p>
                                            {!! $post->description !!}
                                        </p>
                                        <button>Read More</button>
                                    </figcaption>
                                    <a href="{{ get_post_url($post->id) }}"></a>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    @if(isset($settings["custom_pagination"]))
        @if($settings["custom_pagination"] === "php")
            {!! $posts->links() !!}
        @elseif($settings["custom_pagination"] === "scroll")
            <div class="ajax-load text-center" style="display:none">
                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
            </div>
            <input type="hidden" id="custom_limit_per_page_for_ajax" value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
        @else
            <button class="custom_load_more">Load More</button>
            <div class="ajax-load-button text-center" style="display:none">
                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
            </div>
            <input type="hidden" id="custom_limit_per_page_for_ajax" value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
        @endif
    @endif
    {{--<div class="container">
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
    </div>--}}
</section>
{!! BBstyle($_this->path."/css/main.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}