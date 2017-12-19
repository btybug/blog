@extends( 'btybug::layouts.admin' )
@section( 'content' )
    <div class="row">
        <h2>Edit Form</h2>
        <div class="col-md-12">

            <div class="bty-panel-collapse 	bty-panel-cl-tomato">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general"
                       aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">General</span>
                        <a class="bty-btn bty-btn-save bty-btn-cl-black bty-btn-size-sm pull-right m-r-10"><span>Save</span></a>
                    </a>
                </div>
                <div id="general" class="collapse in" aria-expanded="true" style="">
                    <div class="content">
                        <div class="col-md-12 m-b-15">
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <span class="bty-hover-17 bty-f-s-20">Form name</span>
                                </div>
                                <div class="col-md-8">
                                    <input class="bty-input-label-2 m-t-0" placeholder="What is your Form name ?"
                                           name="form_name" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bty-panel-collapse 	bty-panel-cl-tomato m-t-20">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#availableFields"
                       aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">Available Fields</span>
                    </a>
                </div>
                <div id="availableFields" class="collapse in" aria-expanded="true" style="">
                    <div class="content">
                        <div class="text-center">
                            @if(count($fields))
                                @foreach($fields as $field)
                                    <div class="col-md-2">
                                        <p>
                                            <input type="checkbox" data-id="{!! $field->id !!}"
                                                   value="{!! $field->column_name !!}"
                                                   name="fields[{!! $field->id !!}]"
                                                   class="bty-input-checkbox-2 select-field"
                                                   id="bty-cbox-{{ $field->id }}">
                                            <label for="bty-cbox-{{ $field->id }}">{{ $field->name }}</label>
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                No Columns Available
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="bty-panel-collapse 	bty-panel-cl-tomato m-t-20">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#settingsFields"
                       aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">Settings</span>
                    </a>
                </div>
                <div id="settingsFields" class="collapse in" aria-expanded="true" style="">
                    <div class="content">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <span class="bty-hover-17 bty-f-s-20">Form title</span>
                                </div>
                                <div class="col-md-8">
                                    <input class="bty-input-label-2 m-t-0 form-title-settings" placeholder="What is your Form title ?"
                                           name="form_title" type="text" value="Create post">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2>Preview Area</h2>

            <div class="col-md-12 preview-area">
                {!! Form::open(['class' => 'bty-form-5']) !!}
                <h2 class="form-title">Create Post</h2>
                {!! Form::hidden('form_id',$form->id) !!}


                <button type="submit" class="bty-btn bty-btn-save"><span>Save</span></button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section( 'CSS' )
@stop

@section( 'JS' )
    <script>
        $(document).ready(function () {
            $("body").on('input','.form-title-settings',function () {
                var val = $(this).val();

                $(".form-title").text(val);
            });

            $("body").on('change', '.select-field', function () {
                var checkbox = this;
                var field = $(checkbox).val();
                if (checkbox.checked) {
                    var table = "posts";
                    $.ajax({
                        url: "{!! url('admin/blog/render-fields') !!}",
                        data: {table: table, field: field},
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (!data.error) {
                                $("input[name='form_id']").after(data.html);
                            }
                        },
                        type: 'POST'
                    });
                    // alert($(checkbox).val());
                } else {

                    $("#bty-input-id-" + $(checkbox).data('id')).remove();
                }
            });
        });
    </script>
@stop