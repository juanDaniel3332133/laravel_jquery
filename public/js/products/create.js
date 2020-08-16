const CreateProductModule = (() => {

	const _modal = $('#createProductModal');

	const showModal = () => {

		$.get('/products/create', html => {

			_modal.empty()
				 .append(html)
				 .modal('show');
		})
		.then(_parseCategoriesSelectToSelect2);
	}

	const _parseCategoriesSelectToSelect2 = () =>
	{
		$('#categories_ids').select2({
			dropdownParent: _modal,
			multiple: true,
			placeholder: 'Seleccione categoria'		
		});

	}

	const previewImage = (event) =>
	{
	  let image = event.target.files[0];
	  
	  const reader = new FileReader();
	  
	  reader.readAsDataURL(image); 
	  
	  reader.onload = (_event) => $('#productImage').attr('src', reader.result);
	}

	const sendForm = (event) =>
	{
		event.preventDefault();

		if ($('#sendCreateProductFormBtn').hasClass('disabled'))
			return;

		$('#sendCreateProductFormBtn').addClass('disabled');

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
			complete: () => $('#sendCreateProductFormBtn').removeClass('disabled')
		});
	}

	const _handleResponse = (response) =>
	{
		let action = () => {
			_modal.modal('hide');
			ProductsTableModule.reload();
		};

		swal.fire("Exito!", response.message, "success")
			.then(() => action())
			.catch(() => action());
	}

	const _handleError = (_error) =>
	{
		const errors = _error.responseJSON.errors;

		Object.values(errors).forEach(error => toastr.error(error,'Campo requerido'));
	}

	return {
		showModal: showModal,
		previewImage: previewImage,
		sendForm: sendForm
	};

})();

/* events */

$('#createProductModalBtn').click(CreateProductModule.showModal);

$('#createProductModal').on('change','#photoInput',CreateProductModule.previewImage);

$(document).on('submit','#createProductForm',CreateProductModule.sendForm);
