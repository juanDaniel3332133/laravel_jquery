<div class="modal-dialog modal-success" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Editar producto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      
        <form id="updateProductForm" enctype="multipart/form-data" method="POST" action="{{route('products.update', $product->id)}}">
          
          @method('PUT')

          <div class="form-group">
            <label for="newName">Nombre:</label>
            <input type="text" class="form-control" id="newName" name="name" placeholder="nombre" value="{{$product->name}}">
          </div>
          
          <div class="form-group">
            <label for="new_categories_ids">Categorias:</label>
            <select multiple="" class="form-control" style="width: 100%" id="new_categories_ids" name="categories_ids[]">
                @foreach($categories as $category)
                  <option 
                    @if( $categories_ids_of_product->contains($category->id))
                      selected 
                    @endif value="{{$category->id}}">
                    {{$category->name}}
                  </option>
                @endforeach
            </select>
          </div>
            
          <div class="form-group">
            <label for="description">Descripcion:</label>
            <textarea name="description" class="form-control" id="description">{{$product->description}}</textarea>
          </div>

          <div class="form-group text-center">
            
            <img src="{{$product->image_path}}" class="img-fluid col toggleFullscreenImage mb-2 pointer" alt="..." id="newProductImage">

            <input id="newPhotoInput" type="file" accept='image/png, image/jpg, image/jpeg' size="5"  name="image">

            <label class="btn btn-md btn-primary" for="newPhotoInput">Nueva imagen</label>
            <br>
            <span class="text-danger">Nueva imagen reemplazar anterior</span>

          </div>

        </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="updateProductForm" id="sendUpdateProductFormBtn" class="btn btn-primary">Actualizar</button>
    </div>
  </div>
</div>