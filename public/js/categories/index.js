const CategoriesTableModule = (() => {

    const init = () => {

    	$('#categoriesTable').DataTable( {
    	    ajax: {
    	    	url: '/api/categories',
    	    	dataSrc: 'categories'
    	    },
    	    columns: [
                { title: 'Nombre', data: 'name' },
                { title: 'Fecha de Registro', data: 'created_at' },
                { title: 'Acciones', render:( data, type, row ) => {
                      return         `<a href="/categories/${row.id}/edit" class="btn btn-sm mb-2 btn-block btn-success editCategory">Editar<a/>
                                     <a href="/categories/${row.id}" class="btn btn-sm mb-2 btn-block btn-danger removeCategory">Eliminar<a/>`;
                }},
    	    ],
        	language: {
        	  processing: "Procesando...",
        	  search: "Buscar:",
        	  lengthMenu: "Mostrar _MENU_ elementos",
        	  info: "Mostrando desde _START_ al _END_ de _TOTAL_ elementos",
        	  infoEmpty: "Mostrando ningún elemento.",
        	  infoFiltered: "(filtrado _MAX_ elementos total)",
        	  infoPostFix: "",
        	  loadingRecords: "Cargando registros...",
        	  zeroRecords: "No se encontraron registros",
        	  emptyTable: "No hay datos disponibles en la tabla",
        	  paginate: {
        	    first: "Primero",
        	    previous: "Anterior",
        	    next: "Siguiente",
        	    last: "Último"
        	  },
        	  aria: {
        	    sortAscending: ": Activar para ordenar la tabla en orden ascendente",
        	    sortDescending: ": Activar para ordenar la tabla en orden descendente"
        	  }
        	}
    	});
    }

    const reload = () => $('#categoriesTable').DataTable().ajax.reload(null, false)

    return {
        init: init,
        reload: reload
    };

})();

const CategoriesModalModule = (() => {

    const _modal = $('#categoriesModal');

    const closeModal = async () => {

        return await new Promise((resolve, rejected) => {

            _modal.modal('hide');

            setTimeout(() => resolve(true), 200);
        });
    }

    const showModal = () => {

        $.get('/categories', html => {
            _modal.empty()
                  .append(html);

        }).then(() => {
            CategoriesTableModule.init();
            _modal.modal('show');
        });

    }

    return {
        showModal: showModal,
        closeModal: closeModal
    };

})();

$(document).on('click','#showCategoriesModalBtn', CategoriesModalModule.showModal);
