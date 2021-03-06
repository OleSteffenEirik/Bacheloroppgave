// AJAX funksjon for å glemt og bytte passord
$(function ajaxFormNewUser() {

	// Henter form
	var form = $('#ajaxFormNewUser');

	// Henter div
	var formMessages = $('#formMessagesNewUser');

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

            $('#AddUserModal').modal('hide');

			// Lager melding
			$(formMessages).text(response);
			$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');
		})
		.fail(function(data) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $(formMessages).attr('role', 'alert');

			$('#AddUserModal').modal('hide');

			// Lager melding
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
				$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
});

// AJAX funksjon for å glemt og bytte passord
$(function ajaxFormForgotPW() {

	// Henter form
	var form = $('#ajaxFormForgotPW');

	// Henter div
	var formMessages = $('#formMessagesForgotPW');

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

            $('#ModalForgotPW').modal('hide');

			// Lager melding
			$(formMessages).text(response);
			$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');

			// Nullstiler formen
			$('#email').val('');
		})
		.fail(function(data) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $(formMessages).attr('role', 'alert');

			$('#ModalFrogotPW').modal('hide');

			// Lager melding
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
				$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');

			}
		});
	});
});

// AJAX funksjon for å glemt og bytte passord
$(function ajaxFormChangePassword() {

	// Henter form
	var form = $('#ajaxFormChangePW');

	// Henter div
	var formMessages = $('#formMessagesChangePW');

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

            $('#ChangePWModal').modal('hide');

			// Lager melding
			$(formMessages).text(response);
			$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');

			// Nullstiler formen
			$('#newPassword').val('');
			$('#repeatPassword').val('');
		})
		.fail(function(data) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $(formMessages).attr('role', 'alert');

			$('#ChangePWModal').modal('hide');

			// Lager melding
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
				$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');
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
			// Legger på spinner icon på logg inn knappen ved innlogging
			$('#signin-icon').removeClass('fa-sign-in-alt');
			$('#signin-icon').addClass('fa-spinner fa-spin');

			window.location.href = 'php/home.php';

			window.setTimeout(function() {
				grecaptcha.reset();
			}, 5000);
		})
		.fail(function(data) {
			// Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
			$(formMessages).attr('role', 'alert');

			//Auto hide animasjon
			//$(formMessages).fadeTo(5000, 500).slideUp(500);

			// Lager melding
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
				$(formMessages).prepend('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>');
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}

			grecaptcha.reset();
		});
	});
});

function onHuman(response) { 
	document.getElementById('captcha').value = response; 
} 