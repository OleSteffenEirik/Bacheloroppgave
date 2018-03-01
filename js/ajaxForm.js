// AJAX funksjon for å glemt og bytte passord
$(function ajaxForm() {

	// Henter form
	var form = $('#ajaxForm');

	// Henter div
	var formMessages = $('#form-messages');

	// Event listener for formen
	$(form).submit(function(e) {
		// Hindrer submit av formen
		e.preventDefault();

		// Serializer form data
		var formData = $(form).serialize();

		// Submitter formen med AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
        })
		.done(function(response) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-danger');
            $(formMessages).addClass('alert-success');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $(formMessages).attr('role', 'alert');

            $('#exampleModal').modal('hide');

			// Lager melding
			$(formMessages).text(response);

			// Nullstiler formen
			$('#email').val('');
			$('#newPassword').val('');
			$('#repeatPassword').val('');
		})
		.fail(function(data) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $(formMessages).attr('role', 'alert');

			$('#exampleModal').modal('hide');

			// Lager melding
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
});

// AJAX funksjon for innlogging med reCaptcha
$(function ajaxFormCaptcha() {

	// Henter form
	var form = $('#ajaxFormCaptcha');

	// Henter div
	var formMessages = $('#form-messages');

	// Event listener for formen
	$(form).submit(function(e) {
		// Hindrer submit av formen
		e.preventDefault();

		// Serializer form data
		var formData = $(form).serialize();

		// Submitter formen med AJAX
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
        })
		.done(function(response) {
			// Lager Bootstrap alerts
			$(formMessages).removeClass('alert-danger');
			$(formMessages).addClass('alert-success');
			
			$(formMessages).addClass('alert alert-dismissible fade show text-left');
			$(formMessages).attr('role', 'alert');

			// Lager melding
			$(formMessages).text(response);

			window.location.href='php/profile.php';

			grecaptcha.reset();
		})
		.fail(function(data) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $(formMessages).attr('role', 'alert');

			grecaptcha.reset();

			// Lager melding
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
});

function onHuman(response) { 
	document.getElementById('captcha').value = response; 
} 