
@if(in_array("create", $buttons))
    <a href="{{ url(Route::current()->uri() . "/create") }}" class="btn btn-info">Cadastrar</a>
    <div class="clearfix"></div>
    <br/>
@endif

@if(in_array("edit", $buttons))
    <a href="{{ url(Route::current()->uri() . "/" . $id . "/edit/") }}"  class="btn btn-info">
        <i class="fa fa-pencil"></i>
    </a>

@endif

@if(in_array("remove", $buttons))
    <a href="{{ url(Route::current()->uri() . "/" . $id . "/remove") }}" class="btn btn-danger">
        <i class="fa fa-trash-o"></i>
    </a>

@endif

@if(in_array("view", $buttons))
    <a href="{{ url(Route::current()->uri() . "/" . $id . "/view") }}" class="btn btn-info">
        <i class="fa fa-eye"></i>
    </a>

@endif