<div class="row">
    <div class="col-xs-12 ">
        @option('comment','f',$data)
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="">Select Comment Unit</label>
                    </div>
                    <div class="col-md-8">
                        {!! BBbutton2('unit','comment_unit',"comment","Change",['class'=>'btn btn-default change-layout','model'=>$settings]) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        @endoption

        @option('comment','s',$data)
            <div class="col-md-12">
                NO STYLE YET
            </div>
        @endoption
    </div>
</div>
