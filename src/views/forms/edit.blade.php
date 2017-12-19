@extends( 'btybug::layouts.admin' )
@section( 'content' )
    <div class="row">
        <h2>Edit Form</h2>
        <div class="col-md-12">
            <div class="bty-panel-collapse 	bty-panel-cl-tomato">
                <div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#availableFields" aria-expanded="true">
                        <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <span class="title">Available Fields</span>
                        <a class="bty-btn bty-btn-save bty-btn-cl-black bty-btn-size-sm pull-right m-r-10"><span>Save</span></a>
                    </a>
                </div>
                <div id="availableFields" class="collapse in" aria-expanded="true" style="">
                    <div class="content">
                        <div class="text-center">
                            @if(count($fields))
                                @foreach($fields as $field)
                                    <div class="col-md-2">
                                        <p>
                                            <input type="checkbox" value="1" name="fields[{!! $field->id !!}]" class="bty-input-checkbox-2" id="bty-cbox-{{ $field->id }}">
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

            <h2>Preview Area</h2>

            <div class="col-md-12 preview-area">

            </div>
        </div>
    </div>
@stop
@section( 'CSS' )
@stop

@section( 'JS' )
@stop