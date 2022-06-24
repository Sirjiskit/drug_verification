$(document).ready(function () {
    var $form = $('#accountRegisterForm');
    $('#accountInputname').upperFirstAll();
    $('#accountInputCompany').upperFirstAll();
    $('#accountInputEmail').lowerCase();
    $form.validate({
        debug: true,
        submitHandler: function () {
        },
//        errorClass: "is-invalid",
        validClass: "is-valid",
//        errorElement: "em",
        errorPlacement: function (error, element) {
            if (element.attr("name") === "tc") {
                error.insertAfter("#checkError");
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            name: "required",
            company: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            password: "required",
            tc: 'required'
        },
        messages: {
            name: 'Please enter your fullname',
            company: {
                required: "Please specify your company name",
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            email: {
                required: "We need your email address to serve as your username",
                email: "Your email address must be in the format of name@domain.com"
            },
            password: 'Please provide a strong password',
            tc: 'You must accept terms and condinations to complete your registrations'
        }
    });
    $form.submit(function (e) {
        e.preventDefault();
        if (!$(this).valid()) {
            return false;
        }
        var fd = new FormData(this);
        var url = $(this).attr('action');
        $form.Save({data: fd, url});
    });
    $('#showPassword').click(function () {
        var x = document.getElementById('accountInputPassword');
        if (x.type === 'password') {
            x.type = 'text';
            $(this).find('i').removeClass('mdi-eye-off').addClass('mdi-eye');
        } else {
            x.type = 'password';
            $(this).find('i').removeClass('mdi-eye').addClass('mdi-eye-off');
        }
    });
});