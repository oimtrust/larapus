$(document).ready(function() {
	//confirm delete
	$(document.body).on('submit', '.js-confirm', function(){
		var $el		= $(this)
		var text	= $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini?'
		var c 		= confirm(text);
		return c;
	});

	//add selectize to select element
	$('.js-selectize').selectize({
		sortField: 'text'
	});

	//Delete review book
	$(document.body).on('submit', '.js-review-delete', function(){
		var $el  = $(this);
		var text = $el.data('confirm') ? $el.data('confirm') : "Anda yakin melakukan tindakan ini?";
		var c 	 = confirm(text);

		//Cancel delete
		if(c === false) return c;

		//Delete via ajax
		//Disable behavior default dari tombol submit
		event.preventDefault();

		//Hapus data buku dengan ajax
		$.ajax({
			type		: 'POST',
			url 		: $(this).attr('action'),
			dataType	: 'json',
			data 		: {
				_method	: 'DELETE',

				//Menambah csrf token dari laravel
				_token	: $(this).children('input[name=_token').val()
			}
		}).done(function(data){
			//Cari baris yang dihapus
			baris = $('#form-'+data.id).closest('tr');

			//Hilangkan baris (fadeout kemudian remove)
			baris.fadeout(300, function(), {$(this).remove()});
		});
	});
});