@if($data && count($data))
    @foreach($data as $field)
        @if($field->type)
            <li class="p-10">
                <div class="listinginfo bb-menu-item">
                    @include("blog::_partials.fields.".$field->type,[$field->toArray()])
                </div>

                <a href="javascript:void(0)" class="btn btn-danger delete-field" style="
                    position: absolute;
                    top: 0;
                    right: 0;
                "><i class="fa fa-close"></i></a>
            </li>
        @endif
    @endforeach
@endif