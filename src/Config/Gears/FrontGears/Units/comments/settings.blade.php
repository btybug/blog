@php
$containers = getDinamicStyle('containers');
$texts = getDinamicStyle('texts');
$images = getDinamicStyle('images');
$buttons = getDinamicStyle('buttons');
@endphp

<div class="row">
    <div class="col-xs-12 ">
        @option('general','f',$data)
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Show / Hide Image</label>
                </div>
                <div class="col-md-8">
                    <input type="checkbox" class="show_img" name="show_img" {{isset($settings['show_img']) ? 'checked' : ''}}>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @endoption

        @option('general','s',$data)
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Select Container Style</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('c_container',['' => 'Select style'] + $containers,null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Select Image Style</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('c_img',['' => 'Select style'] + $images,null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Select Username Style</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('c_name',['' => 'Select style'] + $texts,null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Select date Style</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('c_date',['' => 'Select style'] + $texts,null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Select comment Style</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('c_comment',['' => 'Select style'] + $texts,null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Select Reply button Style</label>
                </div>
                <div class="col-md-8">
                    {!! Form::select('c_reply',['' => 'Select style'] + $buttons,null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @endoption
    </div>
</div>
