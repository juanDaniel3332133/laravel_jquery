const ProductsTableModule = (() => {

    const _table = $('#productsTable'); 

    const init = () =>
    {
        _table.DataTable( {
            ajax: {
                url: '/api/products',
                dataSrc: 'products'
            },
            columns: [
                { title: 'Nombre', data: 'name' },
                { title: 'Codigo', data: 'code', render: (data, type, row) => {
                  return `<span class="badge badge-primary" >${row.code}</span>`;
                } },
                { title: 'Foto', data: 'image_path',render:( data, type, row ) => {
                    return `<img width="200px" height="200px" src="${row.image_path}" class="toggleFullscreenImage pointer">`
                }},
                { title: 'Acciones', render:( data, type, row ) => {
                      return         `<a href="/products/${row.id}/edit" class="btn btn-sm mb-2 btn-block btn-success editProduct">Editar<a/>
                                     <a href="/products/${row.id}" class="btn btn-sm mb-2 btn-block btn-info productDetails">Ver Detalles<a/>
                                     <a href="/products/${row.id}" class="btn btn-sm mb-2 btn-block btn-danger removeProduct">Eliminar<a/>`;
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

    const reload = () => {

        _table.DataTable().ajax.reload(null, false);
    }

    return {
        init: init,
        reload: reload
    };

})();

$(ProductsTableModule.init);
