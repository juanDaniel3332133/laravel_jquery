<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Editar categoria</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form id="updateCategoryForm" method="POST" action="{{route('categories.update', $category->id)}}">
          
          @method('PUT')

          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="nombre" value="{{$category->name}}">
          </div>
          
        </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="updateCategoryForm" id="sendUpdateCategoryFormBtn" class="btn btn-primary">Actualizar</button>
    </div>
  </div>
</div>