<div class="comment-area {{ issetReturn($settings,'c_container','') }}">
    <div class="comment-heading">
        <h3>3 Thoughts</h3>
    </div>
    <div class="single-comment">
        <div class="media">
            <div class="media-left text-center">
                <a href="">
                    @if(isset($settings['show_img']))
                        <img class="media-object {{ issetReturn($settings,'c_img','') }}" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt="">
                    @endif
                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h3 class="text-uppercase">
                        <span class="{{ issetReturn($settings,'c_name','') }}">John Smith</span>
                        <a href="" class="pull-right  {{ issetReturn($settings,'c_reply','reply-btn') }}">reply</a>
                    </h3>
                </div>
                <p class="comment-date {{ issetReturn($settings,'c_date','') }}">
                    December, 02, 2017 at 5:57 PM
                </p>
                <p class="comment-p {{ issetReturn($settings,'c_comment','') }}">
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
                <a href="">
                    @if(isset($settings['show_img']))
                        <img class="media-object {{ issetReturn($settings,'c_img','') }}" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt="">
                    @endif

                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h3 class="text-uppercase"><span class="{{ issetReturn($settings,'c_name','') }}">John Smith</span></h3>
                </div>
                <p class="comment-date {{ issetReturn($settings,'c_date','') }}">
                    2 days ago
                </p>
                <p class="comment-p {{ issetReturn($settings,'c_comment','') }}">
                    Labore et dolore magna aliquyam erat, sdiam voluptua. At vero eos eaccusam et justo
                    duo dolores et ea rebum. Stet clita kasd.
                </p>
            </div>
        </div>
    </div>
    <div class="single-comment">
        <div class="media">
            <div class="media-left text-center">
                <a href="">
                    @if(isset($settings['show_img']))
                        <img class="media-object {{ issetReturn($settings,'c_img','') }}" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt="">
                    @endif
                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h3 class="text-uppercase">
                        <span class="{{ issetReturn($settings,'c_name','') }}">Sahak Hakobyan</span> <a href="" class="pull-right {{ issetReturn($settings,'c_reply','reply-btn') }}">reply</a>
                    </h3>
                </div>
                <span class="comment-date {{ issetReturn($settings,'c_date','') }}"> 5 hours ago</span>
                <p class="comment-p {{ issetReturn($settings,'c_comment','') }}">
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

{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('images') !!}
{!! useDinamicStyle('containers') !!}
{!! useDinamicStyle('buttons') !!}
<style>

    .comment-area {
        background: #fff;
        border-radius: 4px;
        border: 1px solid #e2e2e2;
        margin-bottom: 60px;
        padding: 50px;
    }

    .comment-area .comment-heading h3 {
        font-size: 18px;
        padding-bottom: 14px;
    }

    .comment-area .single-comment {
        padding-bottom: 25px;
    }

    .comment-area .single-comment .media {
        margin-top: 0;
    }

    .comment-area .single-comment .media-left {
        padding-right: 15px;
        float: left;
    }

    .comment-area .single-comment .media-left img {
        width: 60px;
        height: 60px;
        object-fit: cover;
    }

    .comment-area .single-comment .media-body h3 {
        font-size: 14px;
        margin: 0;
        padding-bottom: 5px;
    }

    .comment-area .single-comment .media-body h3 .reply-btn {
        background: #eee;
        color: #777;
        display: inline-block;
        font-size: 12px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        width: 60px;
    }

    .comment-area .single-comment .media-body h3 .reply-btn:hover {
        background: #da521e;
        color: #fff;
    }

    .comment-area .single-comment .media-body .comment-date {
        color: #888888;
    }

    .comment-area .single-comment .media-body .comment-p {
        font-size: 14px;
        line-height: 24px;
    }

    .comment-area .single-comment-reply {
        margin-left: 30px;
    }

    .leave-comment {
        background-color: #fff;
        border: 1px solid #e2e2e2;
        margin-bottom: 60px;
        padding: 20px;
        color: #212121;
    }

    .leave-comment h4 {
        color: #444;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .leave-comment .contact-form .form-control {
        background-color: #FAFAFA;
        color: #999999;
        border-radius: 0;
        font-size: 14px;
        line-height: 28px;
        padding: 20px;
        border-color: #eee;
        -webkit-box-shadow: inset 0 0 0 rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 0 0 rgba(0, 0, 0, 0.075);
    }

    .leave-comment .contact-form .form-control:focus {
        box-shadow: none;
        border-color: #da521e;
    }

    .leave-comment .send-btn {
        background: #333;
        color: #fff;
        font-family: "Oswald", sans-serif;
        letter-spacing: 1px;
        text-transform: uppercase;
        -webkit-transition: all .33s;
        transition: all .33s;
        border-radius: 0;
    }

    .leave-comment .send-btn:hover {
        background: #da521e;
    }
</style>