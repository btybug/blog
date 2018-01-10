$(function (){
    $('.icp-auto').iconpicker();

    $('.icp').on('iconpickerSelected', function(e) {
        $(this).attr("value", e.iconpickerValue);
    });
});

window.onload = function(){
    $('body').delegate(".show_search_input","click",function(){
        var is_active = $(this).attr("checked");
        if(is_active){
            $(this).attr("checked",false);
            $(".custom_search_div_for_append").addClass('custom_hidden_for_search_div');
        }else{
            $(this).attr("checked",true);
            $(".custom_search_div_for_append").removeClass('custom_hidden_for_search_div');
        }
    });
    $('body').delegate(".show_sort_system","click",function(){
        var is_active = $(this).attr("checked");
        if(is_active){
            $(this).attr("checked",false);
            $(".custom_sort_div_for_append").addClass('custom_hidden_for_sort_div');
        }else{
            $(this).attr("checked",true);
            $(".custom_sort_div_for_append").removeClass('custom_hidden_for_sort_div');
        }
    });
    $("body").delegate(".custom_add_sort_rule","click",function(){
        var content = $(".custom_class_for_copy").html();
        var key = $(".custom_get_data_key").last().data("key");
        if(key === 'repl'){
            key = 0;
        }else{
            key = key + 1;
        }
        key = key.toString();

        content = content.replace(/repl/g, key);
        content = content.replace(/chng_nm/g, 'name');

        $(".custom_sort_append_for_rules").append(content);
    });

    $("#custom_search_by").select2({
        tags: true,
        width: '100%'
    });
};
