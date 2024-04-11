var url = 'http://127.0.0.1:8000';
window.addEventListener("load", function(){

	$('.btn-like').css('cursor', 'pointer');
	$('.btn-undo_like').css('cursor', 'pointer');

	// Botón de like
	function like(){
		$('.btn-like').unbind('click').click(function(){
			console.log('like');
			$(this).addClass('btn-undo_like').removeClass('btn-like');
			$(this).attr('src', url+'/img/arrowUpOn.png');

            var element = $(this).parent();
            $.ajax({
                url: url + '/like/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    updateCountLikes(response, element, 'like');
                }
            });
			undo_like();
		});
	}
	like();

	// Botón de undo_like
	function undo_like(){
		$('.btn-undo_like').unbind('click').click(function(){
			console.log('undo_like');
			$(this).addClass('btn-like').removeClass('btn-undo_like');
			$(this).attr('src', url+'/img/arrowUpOff.png');

			$.ajax({
				url: url+'/undo_like/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado undo_like a la publicacion');
					}else{
						console.log('Error al dar undo_like');
					}
				}
			});

			like();
		});
	}
	undo_like();

    function updateCountLikes(response, element, mensaje) {
        if (response.like) {
            //obtengo el span con la cuenta de likes gracias a su clase css
            //Actualizo el número de likes gracias al nuevo atributo de la respuesta AJAX
            $(element).find('.count-likes').text(response.count);
        } else {
            console.log('Error al dar ' + mensaje);
        }
    }

	// BUSCADOR
	$('#buscador').submit(function(e){
		$(this).attr('action',url+'/gente/'+$('#buscador #search').val());
	});

});
