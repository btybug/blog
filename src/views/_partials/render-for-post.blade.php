<?php

if(isset($settings_for_ajax)){
   $settings = $settings_for_ajax;
}

$col_md_x = "col-md-4";
if (isset($settings["custom_list"]) && !isset($settings["custom_grid"])){
    $col_md_x = "col-md-12";
}
?>

<div class="bty-all-blog">
    <input type="hidden" class="custom_get_bootstrap_col" value="{{$col_md_x}}">
    <div>
        <div class="row">
            @if(count($posts))
                <ul class="custom_append_post_to_ul more-blog">
                    @foreach($posts as $post)
                        <li class=" {{$col_md_x}} custom_class_for_change_col">
                            <div class="single-blog">
                            <div class="post-thumb">
                                <a href="{{ get_post_url($post->id) }}">
                                    <img src="{!! url('public/storage/'.$post->image) !!}" alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                @php
                                    if(isset($settings["custom_section1_for_post"])){
                                        $title = $settings["custom_section1_for_post"];
                                    }else{
                                        $title = 'title';
                                    }
                                if(isset($settings["custom_section2_for_post"])){
                                        $description = $settings["custom_section2_for_post"];
                                    }else{
                                        $description = 'description';
                                    }
                                @endphp
                                <div class="entry-header text-center text-uppercase">
                                    {{--<a href="" class="post-cat">Travel</a>--}}
                                    <h2><a href="{{ get_post_url($post->id) }}">{!! $post->$title !!}</a></h2>
                                </div>
                                <div class="entry-content">
                                    <p>{!! $post->$description !!}</p>
                                </div>
                                <div class="continue-reading text-center text-uppercase">
                                    <a href="{{ get_post_url($post->id) }}">Continue Reading</a>
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
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="clearfix"></div>

                @if(!isset($dont_render_pagination))
                    @if(isset($settings["custom_pagination"]))
                        @if($settings["custom_pagination"] === "php")
                            <?php
                                $limit_page = 10;
                                if(isset($settings["custom_limit_per_page"])){
                                    $limit_page = $settings["custom_limit_per_page"];
                                }
                            ?>
                            <div class="custom_pagination">
                                @if(count($posts) >= $limit_page)
                                    {!! $posts->links() !!}
                                @endif
                            </div>
                        @elseif($settings["custom_pagination"] === "scroll")
                            <div class="ajax-load text-center" style="display:none">
                                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                            </div>
                            <input type="hidden" id="custom_limit_per_page_for_ajax" value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                        @else
                            <div class="text-center blog-load-more">
                            <button class="custom_load_more">Load More</button>
                            </div>
                            <div class="ajax-load-button text-center" style="display:none">
                                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                            </div>
                            <input type="hidden" id="custom_limit_per_page_for_ajax" value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                        @endif
                    @endif
                @endif
        </div>
    </div>
</div>

