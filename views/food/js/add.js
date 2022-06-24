$(document).ready(function () {
    var $form = $('.form-drugs');
    $('[name="name"]').upperFirstAll();
    $form.validate({
        debug: true,
        submitHandler: function () {
        },
        errorClass: "is-invalid",
//        validClass: "is-valid",
        errorPlacement: function (error, element) {
            if (element.attr("name") === "drugs_class[]") {
                error.insertAfter("#checkError");
            } else if (element.attr('name') === "confirm") {
                error.insertAfter("#confirmError");
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            regNo: {
                required: true,
                minlength: 5
            },
            name: {
                required: true,
                minlength: 2
            },
            dom: "required",
            doe: "required",
            manufacturer: {
                required: true,
                minlength: 5
            },
            ingredient: {
                required: true,
                minlength: 5
            },
            confirm: 'required'
        },
        messages: {
            regNo: {
                required: 'Registration number',
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            name: {
                required: "Please specify product name",
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            dom: 'Please provide Manufacture date',
            doe: 'Please provide Expiring date',
            manufacturer: {
                required: "We need the name of food manufacturer",
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            ingredient: {
                required: "Please provide active ingredients",
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            confirm: 'You must confirm that your entries are accurate'
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
});