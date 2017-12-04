<div class="row">
    <div class="col-xs-12 ">
        <div class="panel panelDarkBlack">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#header-widgets"><span class="panelArrow"><i class="fa fa-angle-down"></i></span>Breadcrumb Settings</a>
            </div>
            <div id="header-widgets" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="form-horizontal">
					<!-- Settings -->
                        <div class="form-group">
                            <label class="col-md-4 labelTitle" for="container_style">Container Style</label>
                            <div class="col-md-8">
                                {!! BBbutton('styles','container_style','Select Container Style',['class'=>'select_style btn btn-danger','data-type'=>'container','model'=>$settings]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 labelTitle" for="breadcrumb_style">Breadcrumb Style</label>
                            <div class="col-md-8">
                                {!! BBbutton('styles','breadcrumb_style','Select Breadcrumb Style',['class'=>'select_style btn btn-danger','data-type'=>'breadcrumb','model'=>$settings]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!!  HTML::style($tplPath.'/css/settings.css') !!}
