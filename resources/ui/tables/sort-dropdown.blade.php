<!-- klaravel::ui.tables.sort-dropdown -->
<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="{{route_has($model_name.'.sort',[$item,'up'])}}" class="dropdown-item">
            <i class="fas fa-angle-up fa-fw mr-2"></i> Move up
        </a>
        <a href="{{route_has($model_name.'.sort',[$item,'down'])}}" class="dropdown-item">
            <i class="fas fa-angle-down fa-fw mr-2"></i> Move down
        </a>
        <a href="{{route_has($model_name.'.sort',[$item,'first'])}}" class="dropdown-item">
            <i class="fas fa-angle-double-up fa-fw mr-2"></i> Move first
        </a>
        <a href="{{route_has($model_name.'.sort',[$item,'last'])}}" class="dropdown-item">
            <i class="fas fa-angle-double-down fa-fw mr-2"></i> Move last
        </a>
    </div>
</div>
