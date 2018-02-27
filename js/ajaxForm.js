 // AJAX funksjon for å glemt passord
 $(function() {

	// Get the form.
	var form = $('#ajaxForm');

	// Get the messages div.
	var formMessages = $('#form-messages');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
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
            $('#formMessages').attr('role', 'alert');

            $('#exampleModal').modal('hide');

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			//$('#name').val('');
			$('#email').val('');
			//$('#message').val('');
		})
		.fail(function(data) {
            // Lager Bootstrap alerts
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');
            
            $(formMessages).addClass('alert alert-dismissible fade show text-left');
            $('#formMessages').attr('role', 'alert');

            $('#exampleModal').modal('hide');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
});