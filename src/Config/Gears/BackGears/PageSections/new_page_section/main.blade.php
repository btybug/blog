<div class=" main-wrapper row container_div" style="background:{!!$settings['main-wrapper-color'] or "#ffff" !!} ">

    <div class="col-md-12 section_1_container">
        {!!isset($settings['sidebar_place_holder_first'])?BBRenderSections($settings['sidebar_place_holder_first']):"Section 1" !!}
    </div>
    <div class="col-md-8 main_content_container" >@yield('main_content')</div>
    <div class="col-md-4 placeholder_2_container" >
        {!!isset($settings['sidebar_place_holder_second'])?BBRenderSections($settings['sidebar_place_holder_second']):"Section 2" !!}
    </div>

</div>