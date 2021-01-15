$(document).ready(function() {
	$('form').submit(function(event) {
		$('form .error-text').remove();
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = json.url;
				} else if (json.errors) {
					$.each(json.errors, function (name, value) {
						$('[name=' + name + ']').after('<span class="error-text">' + value + '</span>');
					});
				} else {
					alert(json.status + ' - ' + json.message);
				}
			},
		});
	});
});
