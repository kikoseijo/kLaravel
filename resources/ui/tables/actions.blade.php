<!-- klaravel::ui.tables.actions -->
<td style="{{$style or ''}}" class="align-middle text-center">
  <div class="btn-group{{isset($size)?' btn-group-'. $size:''}} klara-bt-group" role="group">
    <a href="{{ route_has($model_name.'.edit', $item->id) }}" data-toggle="tooltip" title="Edit record" class="btn btn-primary">
      <i class="far fa-edit" aria-hidden="true"></i>
    </a>
    {{$slot or ''}}

    @if (isset($item->sortable) && count($item->sortable)>0)
        @if (!isset($hide_sort))
            @include('klaravel::ui.tables.sort-dropdown')
        @endif
    @endif


    <a class="btn btn-danger" data-toggle="tooltip" title="Delete record"
        onclick="event.preventDefault(); if (confirm('Confirm delete?')){ document.getElementById('delete-item-{{$item->id}}').submit();}"
        href="{{ route_has($model_name.'.index') }}">
      <i class="far fa-trash-alt" aria-hidden="true"></i>
    </a>
  </div>
  <form id="delete-item-{{$item->id}}" action="{{ route_has($model_name.'.destroy', $item->id) }}" method="POST" style="display: none;">
      @csrf
      <input type="hidden" name="_method" value="delete" />
  </form>
</td>
