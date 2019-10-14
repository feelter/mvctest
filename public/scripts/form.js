$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			statusCode:
			{
                        	404: function () {
	                            alert('Ошибка: Не удалось связаться с сервером.');
                        	},
        	                403: function () {
                	            alert('Ошибка: доступ запрещен!');
					window.setTimeout(window.location.href = "/admin/login",1000);
        	                }
			},
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
			}, 
		});
	});
});