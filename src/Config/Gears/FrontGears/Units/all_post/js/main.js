$(document).ready(function () {
    var token = $("input[name='_token']").val();
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
        $.ajax(
            {
                url: '/admin/blog/append-post-scroll-paginator?page=' + page,
                type: "post",
                data:{_token:token,custom_limit_per_page:limit,bootstrap_col:bootstrap_col},
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $(".custom_append_post").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    }

    $("body").delegate(".custom_load_more","click",function(){
        var limit = $("#custom_limit_per_page_for_ajax").val();
        var bootstrap_col = $(".custom_get_bootstrap_col").val();
        $.ajax(
            {
                url: '/admin/blog/append-post-scroll-paginator?page=' + page,
                type: "post",
                data:{_token:token,custom_limit_per_page:limit,bootstrap_col:bootstrap_col},
                beforeSend: function()
                {
                    $('.ajax-load-button').show();
                }
            })
            .done(function(data)
            {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load-button').hide();
                $(".custom_append_post").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    });

 });
