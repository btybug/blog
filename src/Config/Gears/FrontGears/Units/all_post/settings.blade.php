<?php
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
?>
<div class="row">
    <div class="col-xs-12 ">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">General</span>
                </a>
            </div>
            <div id="general" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div>
                        <h5>Show search input:</h5>
                        {{--<input type="checkbox" name="custom_search" class="show_search_input">--}}
                        <input name="custom_search" type="checkbox" class="show_search_input bty-input-checkbox-5"
                               id="bty-checkbox-search-set">
                        <label for="bty-checkbox-search-set"></label>
                    </div>
                    <div class="custom_search_div_for_append custom_hidden_for_search_div">
                        <h6>Search by:</h6>
                        <div class="bty-input-select-1">
                            <select name="custom_search_by" id="">
                                <option value="id">ID</option>
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
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#sorting"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Sort system</span>
                </a>
            </div>
            <div id="sorting" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div>
                        <h5>Show sort system:</h5>
                        {{--<input type="checkbox" name="custom_sort" class="show_sort_system">--}}
                        <input name="custom_sort" type="checkbox" class="show_sort_system bty-input-checkbox-5"
                               id="bty-checkbox-search-sort">
                        <label for="bty-checkbox-search-sort"></label>
                    </div>

                    <div class="custom_sort_div_for_append custom_hidden_for_sort_div">
                        <h6>Sort by
                        <i class="fa fa-plus custom_add_sort_rule"></i>
                        </h6>
                        <div class="custom_sort_append_for_rules">
                            <div class="sort-select-ad">
                                <div class="bty-input-select-1">
                                <select name="custom_sort_by" id="">
                                    <option value="id">ID</option>
                                    @foreach($post as $key => $val)
                                        @if($key === 'id')
                                            @continue
                                        @endif
                                        <option value="key">{{$key}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div>
                                <input name="custom_sort_how" type="radio" class="bty-input-radio-1" id="bty-sort-asc">
                                <label for="bty-sort-asc">ASC:</label>
                                {{--ASC: <input type="radio" name="custom_sort_how">--}}
                                {{--DESC: <input type="radio" name="custom_sort_how">--}}
                                <input name="custom_sort_how" type="radio" class="bty-input-radio-1" id="bty-sort-desc">
                                <label for="bty-sort-desc">DESC:</label>
                                </div>
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
