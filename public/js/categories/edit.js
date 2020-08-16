const UpdateCategoryModule = (() => {

	const _modal = $('#editCategoryModal');

	const showModal = (event) => {

		event.preventDefault();

		const url = $(event.target).attr('href');

		CategoriesModalModule.closeModal().then(() => {

			$.get(url, html => {
				_modal.empty()
						.append(html)
						.modal('show');
			});

		});
	}

	const sendForm = (event) => {

		event.preventDefault();

		if ($('#sendUpdateCategoryFormBtn').hasClass('disabled'))
			return;

		$('#sendUpdateCategoryFormBtn').addClass('disabled');

		const form = event.target,
				data = new FormData(form);

		$.ajax({
			url: $(form).attr('action'),
			method: $(form).attr('method'),
			data: data,
			processData: false,
			contentType: false,
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: response => _handleResponse(response),
			error: error => _handleError(error),
			complete: () => {
				$('#sendUpdateCategoryFormBtn').removeClass('disabled');
			}
		});
	}

	const _handleResponse = (response) => {

		swal.fire("Exito!", response.message, "success")
			.then( _closeModal )
			.then( CategoriesModalModule.showModal )
			.catch( _closeModal );
	}

	const _closeModal = async () => {

		return new Promise((resolve, rejected) => {

			_modal.modal('hide');

			setTimeout(() => resolve(true), 200);
		})
	}

	const _handleError = (_error) => {

		const errors = _error.responseJSON.errors;

		Object.values(errors).forEach(error => toastr.error(error,'Campo requerido'));
	}

	return {
		showModal: showModal,
		sendForm: sendForm
	};

})();

/* events */

$(document).on('click','.editCategory', UpdateCategoryModule.showModal);

$(document).on('submit','#updateCategoryForm', UpdateCategoryModule.sendForm);
