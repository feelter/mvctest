$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		var form = this;
		event.preventDefault();
		$.ajax({
			type: $(form).attr('method'),
			url: $(form).attr('action'),
			data: new FormData(form),
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

				if (json.status=='success' && json.url=='')
					form.reset();
				alert(json.status + ': ' + json.message);

				if (json.url) {
					window.location.href = '/' + json.url;
				} 
				
			}, 
		});
	});
});