<div class="form-group col-md-12">
    <label class="col-md-2 control-label" for="post-desc">Post Short Description</label>
    <div class="col-md-6">
        {!! Form::textarea('short_desc',null,['id' => 'post-short-desc','class' => 'form-control input-md','placeholder' => 'Enter Post Short Description']) !!}
    </div>
</div>
<div class="form-group col-md-12">
    <label class="col-md-2 control-label" for="post-desc">Enter Tags</label>
    <div class="col-md-6">
        {!! Form::text('tags',null,['class' => 'form-control input-md','placeholder' => 'Enter tags']) !!}
    </div>
</div>