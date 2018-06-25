@php
    $post = find_post_by_url();
    $comments = [];
    $count = 0;
    if($post){
        $comments = $post->comments()->where('status','approved')->where('parent_id',null)->get();
        $count = $post->comments()->where('status','approved')->count();
    }
@endphp
<div class="comment-area">
    <div class="comment-heading">
        <h3>{{ $count }} Thoughts</h3>
    </div>
    @if(count($comments))
        @foreach($comments  as $comment)
            <div class="single-comment">
                <div class="media">
                    <div class="media-left text-center">
                        <a href="#"><img class="media-object" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt=""></a>
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <h3 class="text-uppercase">
                                @if($comment->author)
                                    <a href="#">{{ $comment->author->username }}</a>
                                @else
                                    <a href="#">{{ $comment->guest_name }}</a>
                                @endif
                                <a href="#" class="pull-right reply-btn">reply</a>
                            </h3>
                        </div>
                        <p class="comment-date">
                            {{ BBgetDateFormat($comment->created_at) }}
                        </p>
                        <p class="comment-p">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            </div>

            @if(count($comment->children))
                @foreach($comment->children as $child)
                    <div class="single-comment single-comment-reply">
                        <div class="media">
                            <div class="media-left text-center">
                                <a href="#"> <img class="media-object" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt=""></a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3 class="text-uppercase"><a href="#">{{ $child->author->username }}</a></h3>
                                </div>
                                <p class="comment-date">
                                    {{ BBgetDateFormat($child->created_at) }}
                                </p>
                                <p class="comment-p">
                                    {{ $child->comment }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach
    @endif





</div>
<div class="leave-comment">
    <h4>Leave a reply</h4>
    {!! Form::open(['class' => 'form-horizontal contact-form','route' => 'comment_create_post']) !!}
        @if($post)
            {!! Form::hidden('post_id',$post->id) !!}
        @endif
        @if(Auth::check())
            {!! Form::hidden('author_id',Auth::id()) !!}
        @else
            <div class="form-group">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="guest_name" placeholder="Name" required="">
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" id="email" name="guest_email" placeholder="Email" required="">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="subject" name="guest_url" placeholder="Website url">
                </div>
            </div>
        @endif

        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" rows="6" name="comment" placeholder="Write Massage" required=""></textarea>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Post Comment</button>
    {!! Form::close() !!}
</div>