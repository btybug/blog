@extends('btybug::layouts.admin')
@section('content')

    <style>
        .ui-sortable-handle, .ui-sortable > div {
            outline: 2px dashed #e2e2e2;
            padding: 10px;
            background: #fff;
            cursor: move;
        }

        .bb-field-actions {
            position: absolute;
            top: 5px;
            right: 5px;
            display: none;
        }

        .bb-form-generator>.form-group {
            position: relative;
        }

        .bb-form-generator>.form-group:hover .bb-field-actions{
            display: block;
        }

        [data-toggle="tooltip"]{
            cursor: help;
        }
    </style>

    {!! Form::model($form,['route' => 'add_or_update_form_builder']) !!}
    {!! Form::hidden('id',null) !!}
    {!! Form::hidden('fields_type','posts') !!}
    <div class="container-fluid">
        <div class="col-md-12 m-t-20 m-b-20">
            <div class="bty-panel-collapse bty-panel-cl-blue">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                       href="#formBuilderCollapse" aria-expanded="true">
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
                                    {!! Form::text('name',null,['class' => 'bty-input-label-2 m-t-0', 'placeholder' => 'What is your Form name ?']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="bty-btn bty-btn-save pull-right m-r-5"><span>Save</span>
                                </button>
                                <a class="bty-btn bty-btn-add pull-right m-r-5 select-field"><span>ADD</span></a>
                                <a class="bty-btn bty-btn-default bty-btn-cl-black pull-right m-r-5"><span>Layout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--all and singel settings--}}

        <div class="bb-form-style">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm clear" data-toggle="modal" data-target="#formStyle">
                Form Style
            </button>

            <!-- Modal -->
            <div class="modal fade" id="formStyle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Select Form Style</h4>
                        </div>
                        <div class="modal-body">
                            <div class="bb-form-styles">
                                <!-- Field style -->
                                <div class="bb-field-style">
                                    <a href="javascript:" data-id="style-1">
                                        Style 1
                                    </a>
                                    <script type="template/html" id="style-1">
                                        <div class="form-group" data-field-id="{id}">
                                            <label><i class="fa {icon}"></i> {label}</label>
                                            <i class="fa {tooltip_icon}" data-toggle="tooltip" data-placement="top" title="{help}"></i>
                                            {field}
                                        </div>
                                    </script>
                                </div>

                                <!-- Field style -->
                                <div class="bb-field-style">
                                    <a href="javascript:" data-id="style-2">
                                        Style 2
                                    </a>
                                    <script type="template/html" id="style-2">
                                        <div class="form-group" data-field-id="{id}">
                                            <label><i class="fa {icon}"></i> <strong>{label}</strong></label>
                                            {field}
                                            <span class="help-block">{help}</span>
                                        </div>
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <span class="bty-hover-15 bty-f-s-34">Form Preview</span>
        <div class="col-md-12 bb-menu-container">
            <div class="bb-menu-area bb-form-generator"></div>
        </div>

        <input type="hidden" name="fields" value="[]" id="existing-fields"/>
        <input type="hidden" name="fields_html" value=""/>
        <input type="hidden" name="fields_json" value="[]"/>
    </div>
    {!! Form::close() !!}
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

    <!-- Field Container Template -->
    <script type="template/html" id="field-template">
        <div class="form-group" data-field-id="{id}">
            <label><i class="fa {icon}"></i> {label}</label>
            <i class="fa {tooltip_icon}" data-toggle="tooltip" data-placement="top" title="{help}"></i>
            {field}
        </div>
    </script>

    <!-- Actions Buttons Template -->
    <script type="template/html" id="actions-template">
        <div class="bb-field-actions">
            <button class="btn btn-xs btn-danger delete-field" data-id="{id}">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </script>
@stop
@section('CSS')
    {!! HTML::style('public/css/menus.css?v='.rand(1111,9999)) !!}
    {!! BBstyle(plugins_path("vendor/btybug.hook/blog/src/Assets/css/blog-form.css")) !!}

@stop
@section('JS')
    {{--{!! HTML::script('public/js/jquery.mjs.nestedSortable.js') !!}--}}
    {!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! HTML::script('public/js/jquery-ui/jquery-ui.min.js') !!}
    {!! HTML::script("/public/js/UiElements/bb_styles.js?v.5") !!}
    {!! BBscript(plugins_path("vendor/btybug.hook/blog/src/Assets/js/blog-fields.js")) !!}

    <script>
        function reload_js(src) {
            $('script[src="' + src + '"]').remove();
            $('<script>').attr('src', src).appendTo('body');
        }

        function reload_css(href) {
            $('link[href="' + href + '"]').remove();
            $('<link>').attr({
                'href': href,
                'type': 'text/css',
                'rel': 'stylesheet',
                'media': 'all'
            }).appendTo('head');
        }
    </script>

    <script>
        $(document).ready(function () {

            $("body")
                // Remove field
                .on("click", ".delete-field", function (e) {
                    e.preventDefault();

                    var itemtoRemove = $(this).data('id'),
                        fields = $("#existing-fields");

                    var newData = JSON.parse(fields.val());
                    const index = newData.indexOf(itemtoRemove);
                    newData.splice(index, 1);
                    fields.val(JSON.stringify(newData));
                    resortJSON(newData);

                    // Remove from DOM
                    $(this).closest('.form-group').css("background", "red").fadeOut(function (){
                        $(this).remove();
                    });
                })
                // Select field
                .on("click", ".select-field", function () {
                    var table = "posts";
                    var fields = $("#existing-fields").val();
                    $.ajax({
                        url: "{!! url('admin/blog/get-fields') !!}",
                        data: {table: table, fields: fields},
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

                })
                // Add field to form
                .on("click", ".add-to-form", function () {
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
                            if (!data.error) {
                                addFieldsToFormArea(data.fields);
                            } else {
                                alert(data.message);
                            }
                        },
                        type: 'POST'
                    });

                    reload_js('/public-x/custom/js/form_build_assets.js');
                    reload_css('/public-x/custom/css/form_build_assets.css');
                })
                // Change form style
                .on("click", ".bb-field-style>a", function () {
                    var $this = $(this),
                        template = $('#' + $this.attr('data-id')).html(),
                        fieldsJSON = JSON.parse($('[name=fields_json]').val());

                    $('#field-template').html(template);

                    // Reset fields
                    $('[name=fields]').val('[]');
                    $('[name=fields_json]').val('[]');
                    $('[name=fields_html]').val('');

                    // Apply HTML
                    $('.bb-form-generator').html(formBuilder(fieldsJSON));

                    // Hide modal
                    $('#formStyle').modal('hide');
                });

            @if(isset($form) and $form->fields_json)
            // Default values
            var fieldsJSON = {!! $form->fields_json !!};

            if (fieldsJSON.length > 0) {
                addFieldsToFormArea(fieldsJSON);
            }
            @endif

            // Add fields to form area
            function addFieldsToFormArea(fieldsJSON){
                $('.bb-form-generator').html(formBuilder(fieldsJSON));

                // Tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // Add action button to fields
                $('.bb-form-generator>.form-group').each(function (){
                    var $this = $(this),
                        actionsTemplate = $('#actions-template').html(),
                        id = $this.attr("data-field-id");

                    actionsTemplate = actionsTemplate.replace(/{id}/g, id);

                    $this.append(actionsTemplate);
                });
            }

            // Building form and hidden inputs
            function formBuilder(fields) {
                var existingFields = $("#existing-fields"),
                    existingFieldsData = JSON.parse(existingFields.val());

                var fieldsJSON = $('[name=fields_json]'),
                    fieldsJSONData = JSON.parse(fieldsJSON.val());

                var fieldsHTML = $('[name=fields_html]'),
                    fieldsHTMLData = fieldsHTML.val();

                $(fields).each(function (index, field) {
                    // Add to existing fields
                    existingFieldsData.push(field.object.id);

                    // Add fields json
                    fieldsJSONData.push(field);

                    // Render fields
                    fieldsHTMLData += renderFormField(field);
                });

                // Add existing fields to hidden input
                existingFields.val(JSON.stringify(existingFieldsData));

                // Add fields json to hidden input
                fieldsJSON.val(JSON.stringify(fieldsJSONData));

                // Add rendered fields html to hidden input
                fieldsHTML.val(fieldsHTMLData);

                return fieldsHTMLData;
            }

            // Render fields HTML
            function renderFormField(fieldObject) {

                var field = fieldObject.object;

                // Check if not object
                if (!field.id) return;

                var fieldHTML = '',
                    fieldTemplate = $('#field-template').html();

                // Switch types
                switch (field.type) {
                    // Input fields "text, number, email, url"
                    case 'text':
                    case 'number':
                    case 'email':
                    case 'url':
                        fieldHTML = '<input name="{name}" type="' + field.type + '" class="form-control" placeholder="{placeholder}" />';
                        break;

                    case 'textarea':
                        fieldHTML = '<textarea name="{name}" class="form-control" placeholder="{placeholder}"></textarea>';
                        break;

                    case 'select':
                        fieldHTML = '<select name="{name}" class="form-control">';

                        var json_data = fieldObject.field_data;

                        // Read data
                        if (json_data) {
                            // var options = JSON.parse(json_data);
                            $.each( json_data, function( key, option ) {
                                fieldHTML += '<option value="' + key + '">' + option + '</option>';
                            });
                        }

                        fieldHTML += '</select>';
                        break;

                    case 'special':
                        fieldHTML = fieldObject.html;
                        break;
                }

                fieldHTML = fieldHTML.replace(/{placeholder}/g, field.placeholder);
                fieldHTML = fieldHTML.replace(/{name}/g, field.column_name);

                // Insert into template
                fieldTemplate = fieldTemplate.replace(/{label}/g, field.label);
                fieldTemplate = fieldTemplate.replace(/{id}/g, field.id);
                fieldTemplate = fieldTemplate.replace(/{icon}/g, field.icon);
                fieldTemplate = fieldTemplate.replace(/{help}/g, field.help);
                fieldTemplate = fieldTemplate.replace(/{tooltip_icon}/g, field.tooltip_icon);
                fieldTemplate = fieldTemplate.replace(/{field}/g, fieldHTML);

                return fieldTemplate;
            }

            // Resort fields json
            function resortJSON(order) {
                var fieldsJSON = $('[name=fields_json]'),
                    fieldsJSONData = JSON.parse(fieldsJSON.val()),
                    sortedJSON = [];

                var fieldsHTML = $('[name=fields_html]'),
                    fieldsHTMLData = "";

                order.forEach(function (key) {
                    var found = false;
                    fieldsJSONData = fieldsJSONData.filter(function (item) {
                        console.log(item.object.id, key);
                        if (!found && item.object.id === key) {
                            sortedJSON.push(item);

                            // Render fields
                            fieldsHTMLData += renderFormField(item);
                            found = true;
                            return false;
                        } else
                            return true;
                    })
                });

                fieldsJSON.val(JSON.stringify(sortedJSON));
                fieldsHTML.val(fieldsHTMLData);
            }

            // Form sortable
            $('.bb-form-generator').sortable({
                stop: function (event, ui) {
                    var ids = [];

                    $('.bb-form-generator>.form-group').each(function () {
                        var id = $(this).attr("data-field-id");
                        ids.push(parseInt(id));
                    });

                    $('[name=fields]').val(JSON.stringify(ids));

                    // Resort JSON
                    resortJSON(ids);
                }
            });
        });
    </script>
@stop