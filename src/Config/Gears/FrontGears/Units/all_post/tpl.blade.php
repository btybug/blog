@php
    $postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
    $posts = $postRepo->paginationSettings($settings);
    $all_posts = json_encode($postRepo->getPublished());
    $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();
@endphp

<section id="blog-section">
    <form class="navbar-form text-center search-form" id="custom_form_search" role="search">
    <input type="hidden" name="settings_for_ajax" value="{{serialize($settings)}}">
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
                                    @foreach($settings["custom_sort_by"] as $key => $sort_by)
                                        <li>
                                            <a href="#" class="custom_a_for_click_sort" data-by="{{$sort_by['by']}}" data-how="{{$sort_by['how']}}">
                                                {{ $sort_by["fail_name"] ? $sort_by["fail_name"] : $sort_by["by"] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        @endif
                    </li>
                    @if(isset($settings["custom_list"]))
                        <li>
                            <input name="radionav" type="radio" class="bty-navradio nv-1 custom_grid_change" value="list"
                                   id="bty-navradio-1" {{ !isset($settings["custom_grid"]) ? "checked" : ""}}>
                            <label for="bty-navradio-1">
                                <i class="fa {{isset($settings['custom_list_icon']) ? $settings['custom_list_icon'] : 'fa-th-list'}}" aria-hidden="true"></i>
                            </label>
                        </li>
                    @endif
                    @if(isset($settings["custom_grid"]))
                        <li>
                            <input name="radionav" type="radio" class="bty-navradio nv-2 custom_grid_change" value="grid"
                                   id="bty-navradio-2" checked>
                            <label for="bty-navradio-2">
                                <i class="fa {{isset($settings['custom_grid_icon']) ? $settings['custom_grid_icon'] : 'fa-th'}}" aria-hidden="true"></i>
                            </label>
                        </li>
                    @endif
                </ul>
                @if(isset($settings["custom_search"]))
                    <div class="col-md-offset-3 col-md-6 search-head">
                    <input type="search" name="term" class="form-control" placeholder="Search"/>
                    </div>
                    <input type="hidden" name="search_by" value="{{isset($settings['custom_search_by']) ? json_encode($settings['custom_search_by']) : ''}}"/>
                @endif
                <input type="hidden" name="settings_for_ajax_search" value="{{serialize($settings)}}">
                <input type="hidden" name="all_posts" value="{{$all_posts}}">
                <input type="hidden" name="limit_per_page_for_ajax" value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                <input type="hidden" name="custom_get_col" value="{{(isset($settings["custom_list"]) && !isset($settings["custom_grid"])) ? 'col-md-12' : 'col-md-4'}}">
            </div>
        </div>
    </nav>
    </form>
    <div class="custom_append_post">
        @include("blog::_partials.render-for-post")
    </div>
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
{!! BBstyle($_this->path."/css/main.css",$_this) !!}
{!!  BBscript($_this->path.'/js/main.js',$_this) !!}