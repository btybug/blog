(function($){
    $.fn.extend({
        doSearch: function(callback,timeout){
            timeout = timeout || 1e3;
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(this,el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                $el.is(':input') && $el.on('keyup keypress paste cut',function(e){

                    if (e.type=='keyup' && e.keyCode!=8) return;

                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);


$(document).ready(function () {
    var token = $("input[name='_token']").val();
    var base_path = window.location.origin;
     $('.get-user-profile').on('click',function () {
         var url='/'+$('#mytplpath').val()+'/logic.php';
         $.ajax({
             type: "post",
             datatype: "json",
             url:url,
             data:{'function':'profile','test':'qus'},
             headers: {
                 'X-CSRF-TOKEN': $("input[name='_token']").val()
             },
             success: function (data) {
                 if (!data) {
                     console.log(data);
                 }
             }
         });
     });
    $("body").delegate(".custom_grid_change","click",function(){
        var which_type = $(this).val();
        var cols = $("li.custom_class_for_change_col");
        if(which_type === "list"){
            cols.removeClass("col-md-4").addClass("col-md-12");
            $(".custom_get_bootstrap_col").val("col-md-12");
        }else{
            cols.removeClass("col-md-12").addClass("col-md-4");
            $(".custom_get_bootstrap_col").val("col-md-4");
        }
    });


    var page = 1;
    $(window).scroll(function() {
        if(!$('.ajax-load').length){
            return;
        }
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page){
        var limit = $("#custom_limit_per_page_for_ajax").val();
        var bootstrap_col = $(".custom_get_bootstrap_col").val();
        var settings_for_ajax = $('input[name="settings_for_ajax"]').val();
        var all_posts = $("input[name=all_posts]").val();
        $.ajax(
            {
                url: '/admin/blog/append-post-scroll-paginator?page=' + page,
                type: "post",
                data:{
                    _token:token,
                    custom_limit_per_page:limit,
                    bootstrap_col:bootstrap_col,
                    settings_for_ajax:settings_for_ajax,
                    all_posts:all_posts
                },
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html == ""){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                var $data = $(data.html);
                $(".custom_append_post_to_ul").append($data.find('li'));
                $("input[name=all_posts]").val(data.all_posts);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    }
    // this is for load more buttom
    var load_page = 2;
    $("body").delegate(".custom_load_more","click",function(){
        var limit = $("#custom_limit_per_page_for_ajax").val();
        var bootstrap_col = $(".custom_get_bootstrap_col").val();
        var settings_for_ajax = $('input[name="settings_for_ajax"]').val();
        var all_posts = $("input[name=all_posts]").val();
        $.ajax(
            {
                url: '/admin/blog/append-post-scroll-paginator?page=' + load_page,
                type: "post",
                data:{
                    _token:token,
                    custom_limit_per_page:limit,
                    bootstrap_col:bootstrap_col,
                    settings_for_ajax:settings_for_ajax,
                    all_posts:all_posts
                },
                beforeSend: function()
                {
                    $('.ajax-load-button').show();
                }
            })
            .done(function(data)
            {
                if(data.html == ""){
                    $('.ajax-load-button').html("No more records found");
                    return;
                }
                $('.ajax-load-button').hide();
                var $data = $(data.html);
                $(".custom_append_post_to_ul").append($data.find('li'));
                $("input[name=all_posts]").val(data.all_posts);
                load_page++;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    });

    $("#custom_form_search :input").doSearch(function(){
        var that = $("#custom_form_search").serialize();
        $('.custom_append_post').addClass('custom_style_for_loading').html('<img src="'+base_path+'/public/images/load.gif") alt="" class="custom_hidden_loading">');
        $.ajax({
            type : 'POST',
            url: '/admin/blog/search',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data : that,
            success: function(data){
                $('.custom_append_post').removeClass('custom_style_for_loading').html(data.html);
                $("input[name=all_posts]").val(data.all_posts);
            }
        });
    },500);

    $("body").delegate(".custom_a_for_click_sort","click",function(event){
        event.preventDefault();

        $("input[name='sort_by']").remove();
        $("input[name='sort_how']").remove();

        var sort_by = $(this).data("by");
        var sort_how = $(this).data("how");
        $(this).parent().append("<input type='hidden' name='sort_by' value='"+sort_by+"'> <input type='hidden' name='sort_how' value='"+sort_how+"'>");

        $("#custom_form_search :input").first().trigger('keypress');
    });


    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).on('click', '.custom_pagination div ul li a', function (e) {
        e.preventDefault();
        getPosts($(this).attr('href').split('page=')[1]);
    });
    function getPosts(page) {
        var token = $('input[name=_token]').val();
        var all_posts = $("input[name=all_posts]").val();
        var limit = $("#custom_limit_per_page_for_ajax").val();
        var bootstrap_col = $(".custom_get_bootstrap_col").val();
        var settings_for_ajax = $('input[name="settings_for_ajax"]').val();
        $.ajax({
            url : '/admin/blog/findpage?page=' + page,
            data:{
                all_posts:all_posts,
                _token:token,
                limit_per_page:limit,
                bootstrap_col:bootstrap_col,
                settings_for_ajax:settings_for_ajax
            },
            method:'post',
            dataType: 'json',
        }).done(function (data) {
            $('.custom_append_post').removeClass('custom_style_for_loading').html(data.html);
            $("input[name=all_posts]").val(data.all_posts);
            location.hash = page;
        }).fail(function () {
            alert('Something went wrong.');
        });
    }
 });
