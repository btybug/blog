@php
    $page = \Btybug\btybug\Services\RenderService::getPageByURL();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Builder</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {!! HTML::style('public/css/admin.css') !!}
    {!! HTML::style('public/css/menus.css?v='.rand(1111,9999)) !!}
    {!! BBstyle(plugins_path("vendor/btybug.hook/blog/src/Assets/css/blog-form.css")) !!}

    {!! HTML::script('public/js/jquery-2.1.4.min.js') !!}

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

    {!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! HTML::script('public/js/jquery-ui/jquery-ui.min.js') !!}
    {!! HTML::script("/public/js/UiElements/bb_styles.js?v.5") !!}
    {!! BBscript(plugins_path("vendor/btybug.hook/blog/src/Assets/js/blog-fields.js")) !!}

    {!! BBstyle(plugins_path("vendor/btybug.hook/blog/src/Assets/css/form-builder.css")) !!}
    {!! BBscript(plugins_path("vendor/btybug.hook/blog/src/Assets/js/form-builder.js")) !!}

    {!! HTML::style('public-x/custom/css/'.str_replace(' ','-',$page->slug).'.css') !!}
    {!! HTML::script('public-x/custom/js/'.str_replace(' ','-',$page->slug).'.js') !!}
</head>
<body>

{!! Form::model($form,['route' => 'add_or_update_form_builder']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('fields_type','posts') !!}

<div class="bb-form-header">
    <div class="row">
        <div class="col-md-8">
            <label>Form name</label>
            {!! Form::text('name',null,['class' => 'form-name', 'placeholder' => 'Form Name']) !!}
        </div>
        <div class="col-md-4">
            <button type="submit" class="form-save pull-right"><span>Save</span></button>
        </div>
    </div>
</div>

<div class="bb-form-options">

    <a class="btn btn-default select-field"><i class="fa fa-plus"></i> ADD Field</a>

    <div class="form-layout pull-right">
        {!! BBbutton2('unit','form_layout','form_layout','Select Layout',['class'=>'form-control','model'=>$form]) !!}
    </div>

    <div class="pull-right">
        <a class="btn btn-danger form-style" data-toggle="modal" data-target="#formStyle">
            <span>Form Style</span>
        </a>
    </div>
</div>

<div class="container-fluid">

    <div class="bb-form-style">
        <!-- Modal -->
        <div class="modal fade" id="formStyle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
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
                                        <i class="fa {tooltip_icon}" data-toggle="tooltip" data-placement="top"
                                           title="{help}"></i>
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

    <div class="form-preview">
        Form Preview
    </div>

    <div class="row">
        <div class="col-md-12 bb-form-container">
            <div class="bb-form-area"></div>
        </div>
    </div>

    <input type="hidden" name="fields_json" value="{}" id="existing-fields"/>
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
                $(this).closest('.form-group').css("background", "red").fadeOut(function () {
                    $(this).remove();
                });
            })
            // Select field
            .on("click", ".select-field", function () {
                var table = "posts";
                var fields = $("#existing-fields").val();
                var fieldsJSON = JSON.parse(fields);
                var existingFields = [];

                if(Object.keys(fieldsJSON).length > 0){
                    $.each(fieldsJSON, function (index, group){
                        console.log(existingFields, group);
                        existingFields = existingFields.concat(group);
                        console.log(existingFields);
                    });
                }

                $.ajax({
                    url: "{!! url('admin/blog/get-fields') !!}",
                    data: {table: table, fields: JSON.stringify(existingFields)},
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

                // reload_js('/public-x/custom/js/form_build_assets.js');
                // reload_css('/public-x/custom/css/form_build_assets.css');
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
                $('.bb-form-area.active').html(formBuilder(fieldsJSON));

                // Hide modal
                $('#formStyle').modal('hide');
            })
            // Activate form area
            .on("click", ".bb-form-area", function () {
                var toggle = $(this).hasClass("active");
                $('.bb-form-area').removeClass("active");

                if(!toggle) $(this).addClass("active");
            });

        // Change layout "DEMO"
        $('[name=form_layout]').on('change', function (){
            $.ajax({
                url: "{!! url('admin/console/bburl/render-unit') !!}",
                data: {
                    id: $(this).val()
                },
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                dataType: 'json',
                success: function (data) {
                    var layout = data.html;
                    $('.bb-form-container').html(layout);

                    $("#existing-fields").val("[]");

                    activateSortable();

                    reload_js('/public-x/custom/js/form_build_assets.js');
                    reload_css('/public-x/custom/css/form_build_assets.css');
                },
                type: 'POST'
            });
        });

        @if(isset($form) and $form->fields_json)
        // Default values
        var fieldsJSON = {!! $form->fields_json !!};

        if (fieldsJSON.length > 0) {
            $.each(fieldsJSON, function (index, group){
                console.log(group);
                addFieldsToFormArea(group, index);
            });
        }
        @endif

        // Add fields to form area
        function addFieldsToFormArea(fieldsJSON, position) {
            // Mark sortable areas
            $('.bb-form-area').each(function (i){
                $(this).attr("data-sortable", i);
            });

            if(!position) position = 0;

            // Build form
            var activeFormArea = $('.bb-form-area.active');
            if(activeFormArea.length === 1){
                activeFormArea.html(formBuilder(fieldsJSON, activeFormArea.data("sortable")));
            }else{
                $('[data-sortable='+position+']').html(formBuilder(fieldsJSON, position));
            }

            // Tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Add action button to fields
            $('[data-sortable='+position+']>.form-group').each(function () {
                var $this = $(this),
                    actionsTemplate = $('#actions-template').html(),
                    id = $this.attr("data-field-id");

                actionsTemplate = actionsTemplate.replace(/{id}/g, id);

                $this.append(actionsTemplate);
            });
        }

        // Building form and hidden inputs
        function formBuilder(fields, position) {
            var existingFields = $("#existing-fields"),
                existingFieldsData = JSON.parse(existingFields.val());

            // var fieldsJSON = $('[name=fields_json]'),
            //     fieldsJSONData = JSON.parse(fieldsJSON.val());
            //
            var fieldsHTMLData = $('[data-sortable=' + position + ']').html();

            $(fields).each(function (index, field) {
                // Add to existing fields
                if(!existingFieldsData[position]) existingFieldsData[position] = [];
                existingFieldsData[position].push(field.object.id);

                // // Add fields json
                // fieldsJSONData.push(field);
                //
                // Render fields
                fieldsHTMLData += renderFormField(field);
            });

            // Add existing fields to hidden input
            existingFields.val(JSON.stringify(existingFieldsData));

            // // Add fields json to hidden input
            // fieldsJSON.val(JSON.stringify(fieldsJSONData));
            //
            // // Add rendered fields html to hidden input
            // fieldsHTML.val(fieldsHTMLData);
            //
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
                        $.each(json_data, function (key, option) {
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

            // var fieldsHTML = $('[name=fields_html]'),
            //     fieldsHTMLData = "";

            order.forEach(function (key) {
                var found = false;
                fieldsJSONData = fieldsJSONData.filter(function (item) {
                    console.log(item.object.id, key);
                    if (!found && item.object.id === key) {
                        sortedJSON.push(item);

                        // // Render fields
                        // fieldsHTMLData += renderFormField(item);
                        found = true;
                        return false;
                    } else
                        return true;
                })
            });

            fieldsJSON.val(JSON.stringify(sortedJSON));
            // fieldsHTML.val(fieldsHTMLData);
        }

        // Activate sortable
        function activateSortable(){
            // Form sortable
            $('.bb-form-area').sortable({
                connectWith: ".connectedSortable",
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
        }

        activateSortable();
    });
</script>

</body>
</html>