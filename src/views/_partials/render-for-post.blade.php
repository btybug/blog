@if(count($posts))
    @foreach($posts as $post)
        <li class="{{$bootstrap_col}} custom_class_for_change_col">
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
@endif