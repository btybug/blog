@extends('btybug::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-t-20 m-b-20">
            <div class="bty-panel-collapse bty-panel-cl-blue">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#formBuilderCollapse" aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">General</span>
                    </a>
                </div>
                <div id="formBuilderCollapse" class="collapse in" aria-expanded="true" style="">
                    <div class="content" style="overflow: hidden;">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <span class="bty-hover-17 bty-f-s-20">Form name</span>
                                </div>
                                <div class="col-md-8">
                                    {!! Form::text('form_name',null,['class' => 'bty-input-label-2 m-t-0', 'placeholder' => 'What is your Form name ?']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="bty-btn bty-btn-save pull-right m-r-5"><span>Save</span></button>
                                <a class="bty-btn bty-btn-add pull-right m-r-5 select-field"><span>ADD</span></a>
                                <a class="bty-btn bty-btn-default bty-btn-cl-black pull-right m-r-5"><span>Layout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--all and singel settings--}}

        <span class="bty-hover-15 bty-f-s-34">Form Preview</span>
        <div class="col-md-12 bb-menu-container">
            <ol class="bb-menu-area"></ol>

            <div class="bb-form-generator" id="form-generator">
                <ul></ul>
            </div>

        </div>
        <input type="hidden" name="fields" value="" id="existing-fields">
        <input type="hidden" name="fields_json" />
        <input type="hidden" name="fields_html" />
    </div>

    @include('resources::assests.deleteModal')
    @include('resources::assests.magicModal')

    <div class="modal fade" id="select-fields" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-size: 32px;
    font-family: fantasy;
    text-align: center;">Select Fields</h4>
                </div>
                <div class="modal-body" style="min-height: 300px;">

                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success add-to-form">Add to Form</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/menus.css?v='.rand(1111,9999)) !!}
    {!! BBstyle(plugins_path("vendor/btybug.hook/blog/src/Assets/css/blog-form.css")) !!}

@stop
@section('JS')
    {!! HTML::script('public/js/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! HTML::script('public/js/menus.js') !!}
    {!! HTML::script("/public/js/UiElements/bb_styles.js?v.5") !!}
    {!! BBscript(plugins_path("vendor/btybug.hook/blog/src/Assets/js/blog-fields.js")) !!}

    <script>
        $(document).ready(function () {
            $("body").on("click",".delete-field",function () {
                var itemtoRemove = $(this).data('id');
                var arr =  $("#existing-fields").val();
                var newData = JSON.parse(arr);
                const index = newData.indexOf(itemtoRemove)
                newData.splice(index, 1);
                $("#existing-fields").val(JSON.stringify(newData));
                $(this).closest("li").remove();

            }).on("click",".select-field",function () {
                var table = "posts";
                var fields = $("#existing-fields").val();
                $.ajax({
                    url: "{!! url('admin/blog/get-fields') !!}",
                    data: {table: table,fields: fields},
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        $("#select-fields .modal-body").html(data.html);
                        $("#select-fields").modal();
                    },
                    type: 'POST'
                });

            }).on("click",".add-to-form",function () {
                var data = $("#selected-fields").serialize();
                $.ajax({
                    url: "{!! url('admin/blog/render-unit') !!}",
                    data: data + '&existings=' + $("#existing-fields").val(),
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        $("#select-fields").modal("hide");
                        if(! data.error){
                            $("#existing-fields").val(JSON.stringify(data.fields));
                            // $(".bb-menu-area").append(data.html);

                            app.formFields.push(data.fields);
                        }else{
                            alert(data.message);
                        }
                    },
                    type: 'POST'
                });

            });

            $('ol.bb-menu-area').nestedSortable({
                items: 'li',
                isTree: false,
                stop: function(event, ui) {
                    var item = $(ui.item).attr("data-id");
                    var type = $(ui.item).attr("data-type");
                    var parent = $(ui.item).closest('ol').parent('li').attr("data-id");

                    // if(type == 'custom'){
                    //     $.ajax({
                    //         url: '/admin/front-site/structure/front-pages/sorting',
                    //         data: {
                    //             item: item,
                    //             parent: parent
                    //         },
                    //         type: 'POST',
                    //         headers: {
                    //             'X-CSRF-TOKEN': $("input[name='_token']").val()
                    //         },
                    //         dataType: 'json',
                    //         beforeSend : function () {
                    //
                    //         },
                    //         success: function (data) {
                    //             if (! data.error) {
                    //
                    //             }
                    //         }
                    //     });
                    // }else{
                    //     $("ol.bb-menu-area").sortable("cancel");
                    // }
                }
            });
        });
    </script>
@stop