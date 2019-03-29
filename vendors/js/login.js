
// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the login form.
    // It has the name attribute "login"
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {

            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            captcha_code:{
                required: true
            }
        },
        // Specify validation error messages
        messages: {
            password: {
                required: "Please provide a password",
            },
            email: "Please enter a valid email address",
            captcha_code: "Enter the Image code"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
