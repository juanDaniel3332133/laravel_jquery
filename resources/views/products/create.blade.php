<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Nuevo producto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form id="createProductForm" enctype="multipart/form-data" method="POST" action="{{route('products.store')}}">
          
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="nombre">
          </div>
          
          <div class="form-group">
            <label for="categories_ids">Categorias:</label>
            <select multiple="" class="form-control" style="width: 100%" id="categories_ids" name="categories_ids[]">
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
          </div>
            
          <div class="form-group">
            <label for="description">Descripcion:</label>
            <textarea name="description" class="form-control" id="description"></textarea>
          </div>

          <div class="form-group text-center">
            
            <img src="{{asset("/assets/no-photo.png")}}" class="img-fluid col toggleFullscreenImage mb-2 pointer" alt="..." id="productImage">

            <input id="photoInput" type="file" accept='image/png, image/jpg, image/jpeg' size="5"  name="image">

            <label class="btn btn-md btn-primary" for="photoInput">Seleccione imagen</label>

          </div>

        </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="createProductForm" id="sendCreateProductFormBtn" class="btn btn-primary">Registrar</button>
    </div>
  </div>
</div>