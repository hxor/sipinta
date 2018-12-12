@if ($url_show != '')
    <a href="{{ $url_show }}" class="btn-show" title="Detail Resource"><i class="fa fa-eye text-primary"></i></a> |
@endif

@if ($url_edit != '')
    <a href="{{ $url_edit }}" class="btn-edit modal-show"><i class="fa fa-pencil text-inverse"></i></a> |
@endif

@if ($url_destroy)
    <a href="{{ $url_destroy }}" class="btn-delete"><i class="fa fa-trash-o text-danger"></i></a>
@endif
