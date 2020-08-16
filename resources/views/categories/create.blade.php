<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Nueva categoria</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form id="createCategoryForm" method="POST" action="{{route('categories.store')}}">
          
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="nombre">
          </div>
          
        </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="createCategoryForm" id="sendCreateCategoryFormBtn" class="btn btn-primary">Registrar</button>
    </div>
  </div>
</div>