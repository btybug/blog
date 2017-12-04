<div class="demo main-wrapper row container_div" style="background:{!!$settings['main-wrapper-color'] or "#ffff" !!} ">
@if(!isset($settings['hide_area_1']) or $settings['hide_area_1']==0 )
    <div class="col-md-12 section_1_container">
        {!!isset($settings['sidebar_place_holder_first'])?BBRenderSections($settings['sidebar_place_holder_first']):"Section 1" !!}
      </div>
    @endif
    <div class="col-md-8 main_content_container" style=" @if(isset($settings['hide_area_2']) and $settings['hide_area_2']==1 ) width: 100%;@endif" >Main view Section ('content')</div>
    @if(!isset($settings['hide_area_2']) or $settings['hide_area_2']==0 )

    <div class="col-md-4 placeholder_2_container" >
        {!!isset($settings['sidebar_place_holder_second'])?BBRenderSections($settings['sidebar_place_holder_second']):"Section 2" !!}
</div>
        @endif

</div>