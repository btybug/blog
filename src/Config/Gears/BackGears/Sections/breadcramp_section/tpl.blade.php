<!-- breadcrumb -->
<div  class="{!! BBStyleDefault($settings,'container_style','') !!}">
        <ol class="{!! BBStyleDefault($settings,'breadcrumb_style','breadcrumb-arrow') !!} breadcrumb">
            @if(count(BBgetParentPages()))
                @foreach(BBgetParentPages() as $page)
                    <li><a href="{!! url($page->url) !!}">{{ $page->title }}</a></li>
                @endforeach
            @else
                <li><a href="#">Home</a></li>
                <li><a href="#">Page1</a></li>
                <li><a href="#">Page2</a></li>
                <li><a href="#">Page3</a></li>
            @endif
        </ol>
</div>


{!!  HTML::style($tplPath.'/css/styles.css') !!}