@extends('btybug::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="panel panelSettingData">
                <div class="panel-heading" role="tab" id="formBuilder">
                    <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#formBuilderCollapse" aria-expanded="true"
                                               aria-controls="formBuilderCollapse">
                            <i class="glyphicon glyphicon-chevron-right"></i>General</a></h4>
                </div>
                <div id="formBuilderCollapse" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="formBuilder">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    Form name
                                </div>
                                <div class="col-md-8">
                                    {!! Form::text('form_name',null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                {!! Form::submit("Save",['class' => 'btn btn-info pull-right m-r-5']) !!}
                                <a class="btn btn-primary pull-right m-r-5 select-field"> + Field</a>
                                <a class="btn btn-warning pull-right m-r-5">Layout</a>
                            </div>
                        </div>
                        {{--{!!  BBbutton2('unit',"blog_fields","blog_field","Extra Fields",['class'=>'btn btn-default pull-right select-field','data-type'=> "blog_field",'model'=>null]) !!}--}}
                        {{--{!!  BBbutton2('layouts',"blog_layouts","blog_layouts","Layout",['class'=>'btn btn-success pull-right select-field','data-type'=> "blog_layouts",'model'=>null]) !!}--}}
                        {{--{!!  BBbutton2('fields',"blog_fields","posts","Fields",['class'=>'btn btn-warning pull-right select-field','data-key' => 'blog_fields','model'=>null]) !!}--}}
                    </div>
                </div>
            </div>

        </div>
        {{--all and singel settings--}}

        <h3>Form Preview</h3>
        <div class="col-md-12 bb-menu-container">
            <ol class="bb-menu-area">

            </ol>
        </div>
        <input type="hidden" name="fields" value="" id="existing-fields">
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
    <style>
        .panel-heading {
            z-index: 99999999
        }

        .panelSettingData {
            background-color: #85d8d7;
        }

        .panelSettingData .panel-heading {
            background-color: #1c1c1c;
        }

        .panelSettingData label {
            color: #000000;
        }

        .panelSettingData h4 a {
            color: #fff;
        }

        .panelSettingData h4 a:hover, .panelSettingData h4 a:focus {
            text-decoration: none;
        }

        .panelSettingData h4 a i {
            transition: all 0.3s;
            -moz-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            margin-right: 10px;
        }

        .panelSettingData h4 a[aria-expanded="true"] i {
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .settingBtn {
            background-color: #292929;
            color: #fff;
        }

        .settingBtn:hover, .settingBtn:focus {
            color: #fff;
        }

        .form-control {
            background-color: #000000 !important;
            border: none;
            color: #fff
        }
    </style>
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
                $(this).parent().remove();
            });

            $("body").on("click",".select-field",function () {
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
            });


            $("body").on("click",".add-to-form",function () {
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
                            $("#existing-fields").val(data.fields);
                            $(".bb-menu-area").append(data.html);
                        }else{
                            alert(data.message);
                        }
                    },
                    type: 'POST'
                });
            })




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
        })
    </script>
@stop