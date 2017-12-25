@php
    $postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
    $posts = $postRepo->getPublished();
    $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();
@endphp

<section id="blog-section">
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
                                        <span style="font-size: 16px;color: #fff;"><a href="">{!! BBGetUserName($post->id) !!}</a></span>
                                        <span class="pull-right">
				<a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments"></i> 30</a>
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


<style>
    #blog-section {
        margin-top: 40px;
        margin-bottom: 80px;
    }

    #blog-section .content-title {
        padding: 5px;
        background-color: #fff;
    }

    #blog-section .content-title h3 a {
        color: #34495E;
        text-decoration: none;
        transition: 0.5s;
    }

    #blog-section .content-title h3 a:hover {
        color: #F39C12;
    }

    #blog-section .content-footer {
        background-color: #16A085;
        padding: 10px;
        position: relative;
    }

    #blog-section .content-footer span a {
        color: #fff;
        display: inline-block;
        padding: 6px 5px;
        text-decoration: none;
        transition: 0.5s;
    }

    #blog-section .content-footer span a:hover {
        color: #F39C12;
    }

    #blog-section aside {
        margin-top: 30px;
        -webkit-box-shadow: 1px 4px 16px 3px rgba(199, 197, 199, 1);
        -moz-box-shadow: 1px 4px 16px 3px rgba(199, 197, 199, 1);
        box-shadow: 1px 4px 16px 3px rgba(199, 197, 199, 1);
    }

    #blog-section aside .content-footer > img {
        width: 33px;
        height: 33px;
        border-radius: 100%;
        margin-right: 10px;
        border: 2px solid #fff;
    }

    #blog-section .user-ditels {
        width: 300px;
        top: -100px;
        height: 100px;
        padding-bottom: 99px;
        position: absolute;
        border: solid 2px #fff;
        background-color: #34495E;
        right: 25px;
        display: none;
        z-index: 1;
    }

    @media (max-width: 768px) {
        #blog-section .user-ditels {
            right: 5px;
        }

    }

    #blog-section .user-small-img {
        cursor: pointer;
    }

    #blog-section .content-footer:hover .user-ditels {
        display: block;
    }

    #blog-section .content-footer .user-ditels .user-img {
        width: 100px;
        height: 100px;
        float: left;
    }

    #blog-section .user-full-ditels h3 {
        color: #fff;
        display: block;
        margin: 0px;
        padding-top: 10px;
        padding-right: 28px;
        text-align: right;
    }

    #blog-section .user-full-ditels p {
        color: #fff;
        display: block;
        margin: 0px;
        padding-right: 20px;
        padding-top: 5px;
        text-align: right;
    }

    #blog-section .social-icon {
        background-color: #fff;
        margin-top: 10px;
        padding-right: 20px;
        text-align: right;
    }

    #blog-section .social-icon > a {
        font-size: 20px;
        text-decoration: none;
        padding: 5px;
    }

    #blog-section .social-icon a:nth-of-type(1) {
        color: #4E71A8;
    }

    #blog-section .social-icon a:nth-of-type(2) {
        color: #3FA1DA;
    }

    #blog-section .social-icon a:nth-of-type(3) {
        color: #E3411F;
    }

    #blog-section .social-icon a:nth-of-type(4) {
        color: #CA3737;
    }

    #blog-section .social-icon a:nth-of-type(5) {
        color: #3A3A3A;
    }

    /*recent-post-col////////////////////*/
    #blog-section .widget-sidebar {
        background-color: #fff;
        padding: 20px;
        margin-top: 30px;
    }

    #blog-section .title-widget-sidebar {
        font-size: 14pt;
        border-bottom: 2px solid #e5ebef;
        margin-bottom: 15px;
        padding-bottom: 10px;
        margin-top: 0px;
    }

    #blog-section .title-widget-sidebar:after {
        border-bottom: 2px solid #f1c40f;
        width: 150px;
        display: block;
        position: absolute;
        content: '';
        padding-bottom: 10px;
    }

    #blog-section .recent-post {
        width: 100%;
        height: 80px;
        list-style-type: none;
    }

    #blog-section .post-img img {
        width: 100px;
        height: 70px;
        float: left;
        margin-right: 15px;
        border: 5px solid #16A085;
        transition: 0.5s;
    }

    #blog-section .recent-post a {
        text-decoration: none;
        color: #34495E;
        transition: 0.5s;
    }

    #blog-section .post-img, .recent-post a:hover {
        color: #F39C12;
    }

    #blog-section .post-img img:hover {
        border: 5px solid #F39C12;
    }

    /*===============ARCHIVES////////////////////////////*/

    #blog-section button.accordion {
        background-color: #16A085;
        color: #fff;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    #blog-section button.accordion.active, button.accordion:hover {
        background-color: #F39C12;
        color: #fff;
    }

    #blog-section button.accordion:after {
        content: '\002B';
        color: #fff;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    #blog-section button.accordion.active:after {
        content: "\2212";
    }

    #blog-section .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    /*categories//////////////////////*/

    #blog-section .categories-btn {
        background-color: #F39C12;
        margin-top: 30px;
        color: #fff;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;

    }

    #blog-section .categories-btn:after {
        content: '\25BA';
        color: #fff;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    #blog-section .categories-btn:hover {
        background-color: #16A085;
        color: #fff;
    }

    #blog-section .form-control {
        border-radius: 0px;
    }

    #blog-section .btn-warning {
        border-radius: 0px;
        background-color: #F39C12;
        margin-top: 15px;
    }

    #blog-section .input-group-addon {
        border-radius: 0px;
    }
</style>