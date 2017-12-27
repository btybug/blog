<?php
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
?>
<div class="row">
    <div class="col-xs-12 ">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">General</span>
                </a>
            </div>
            <div id="general" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <label>Show search input: <input type="checkbox" name="custom_search" class="show_search_input"></label>
                    <div class="custom_search_div_for_append custom_hidden_for_search_div">
                        Search by: <select name="custom_search_by"  id=""><option value="id">ID</option>
                            @foreach($post as $key => $val)
                                @if($key === 'id')
                                    @continue
                                @endif
                                <option value="key">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#sorting" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Sort system</span>
                </a>
            </div>
            <div id="sorting" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <label>Show sort system: <input type="checkbox" name="custom_sort" class="show_sort_system"></label>
                    <div class="custom_sort_div_for_append custom_hidden_for_sort_div">
                        Sort by <i class="fa fa-plus custom_add_sort_rule"></i>
                        <div class="custom_sort_append_for_rules">
                            <div>
                                <select name="custom_sort_by"  id=""><option value="id">ID</option>
                                    @foreach($post as $key => $val)
                                        @if($key === 'id')
                                            @continue
                                        @endif
                                        <option value="key">{{$key}}</option>
                                    @endforeach
                                </select>
                                ASC: <input type="radio" name="custom_sort_how">
                                DESC: <input type="radio" name="custom_sort_how">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!!  BBstyle($_this->path.'/css/settings.css') !!}
{!!  BBstyle($_this->path.'/css/custom.css') !!}
{!!  BBscript($_this->path.'/js/custom.js') !!}
