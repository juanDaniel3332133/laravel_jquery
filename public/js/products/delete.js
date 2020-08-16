const DeleteProductModule = (() => {

	const remove = (event) => {

		event.preventDefault();

		_showPreconfirMessage().then((result) => {
		  if (result.value)
		  {
		  	const clickedBtn = $(event.target),
		  		  url = clickedBtn.attr('href');

		  	if (clickedBtn.hasClass('disabled'))
		  		return;

		  	clickedBtn.addClass('disabled');

		  	data = new FormData();
		  	data.append('_method', 'DELETE');

		  	$.ajax({
		  		url: url,
		  		method: 'POST',
		  		data: data,
		  		processData: false,
		  		contentType: false,
		  		headers:{
		  			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  		},
		  		success: response => _handleResponse(response),
		  		error: error => _handleError(error),
		  		complete: () => clickedBtn.removeClass('disabled')
		  	});
		  }
		});
	}

	const _showPreconfirMessage = async (event) => {

		return await swal.fire({
		  title: '¿Eliminar producto?',
		  text: "Esta accion no es reversible!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'No, cancelar',
		  confirmButtonText: 'Si, eliminar!'
		});
	}

	const _handleResponse = (response) => {

		ProductsTableModule.reload();
		toastr.success(response.message, "Exito!");
	}

	const _handleError = (_error) => {

		const errors = _error.responseJSON.errors;

		Object.values(errors).forEach(error => toastr.error(error,'Error interno'));
	}

	return {
		remove: remove
	};

})();

/* events */

$(document).on('click','.removeProduct', DeleteProductModule.remove);
