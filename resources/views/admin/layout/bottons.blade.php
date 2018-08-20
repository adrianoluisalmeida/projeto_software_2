
@if(in_array("create", $buttons))
    <a href="{{ url(Route::current()->uri() . "/create") }}" type="submit" class="btn btn-info">Cadastrar</a>
    <div class="clearfix"></div>
    <br/>
@endif

@if(in_array("edit", $buttons))
    <a href="{{ url(Route::current()->uri() . "/" . $id . "/edit/") }}" type="submit" class="btn btn-info">
        <i class="fa fa-pencil"></i>
    </a>

@endif

@if(in_array("remove", $buttons))
    <a href="{{ url(Route::current()->uri() . "/" . $id . "/remove") }}" type="submit" class="btn btn-danger">
        <i class="fa fa-trash-o"></i>
    </a>

@endif