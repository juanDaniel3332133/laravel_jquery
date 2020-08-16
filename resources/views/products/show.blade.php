<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Detalles de producto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form>
          
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input readonly="" type="text" class="form-control" id="name" name="name" placeholder="nombre" value="{{$product->name}}">
          </div>
          
          <div class="form-group">
            <label for="">Categorias:</label>
            <ul class="list-group">
                @foreach($product->categories as $category)
                  <li class="list-group-item">{{$category->name}}</li>
                @endforeach
            </ul>
          </div>
            
          <div class="form-group">
            <label for="description">Descripcion:</label>
            <textarea readonly="" name="description" class="form-control" id="description">{{$product->description}}</textarea>
          </div>

          <div class="form-group text-center">
            
            <img src="{{$product->image_path}}" class="img-fluid col toggleFullscreenImage mb-2 pointer" alt="..." id="productImage">

          </div>

        </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" class="close" data-dismiss="modal">Aceptar</button>
    </div>
  </div>
</div>