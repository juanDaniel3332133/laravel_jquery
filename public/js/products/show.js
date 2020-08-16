const ShowProductModule = (() => {

	const _modal = $('#productDetailsModal');

	const showModal = (event) => {
		
		event.preventDefault();
		
		const url = $(event.target).attr('href');

		$.get(url, html => {
			_modal.empty()
							 .append(html)
							 .modal('show');
		});
	}

	return {
		showModal: showModal
	};

})(); 

/* events */

$(document).on('click','.productDetails', ShowProductModule.showModal);
