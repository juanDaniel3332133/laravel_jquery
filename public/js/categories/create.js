const CreateCategoryModule = (() => {
	
	const _modal = $('#createCategoryModal');

	const showModal = () => {

		CategoriesModalModule.closeModal()
							.then(() => _modal.modal('show'));
	}

	const sendForm = (event) => {

		event.preventDefault();

		if ($('#sendCreateCategoryFormBtn').hasClass('disabled'))
			return;

		$('#sendCreateCategoryFormBtn').addClass('disabled');

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
			success: response => _handleResponse(response, form),
			error: error => _handleError(error),
			complete: () => {
				$('#sendCreateCategoryFormBtn').removeClass('disabled');
			}
		});
	}

	const _handleResponse = (response, form) => {

		swal.fire("Exito!", response.message, "success")
			.then( _closeModal() )
			.then( CategoriesModalModule.showModal )
			.catch( _closeModal() );

		form.reset();
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

$(document).on('click','#showCreateCategoryModalBtn', CreateCategoryModule.showModal);

$(document).on('submit','#createCategoryForm', CreateCategoryModule.sendForm);
