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
            barcode: {
                required: true,
                minlength: 5
            },
            name: {
                required: true,
                minlength: 2
            },
            'drugs_class[]': "required",
            dom: "required",
            doe: "required",
            address: {
                required: true,
                minlength: 5
            },
            confirm: 'required'
        },
        messages: {
            barcode: {
                required: 'Please enter drug code',
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            name: {
                required: "Please specify drugs name",
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
            'drugs_class[]': 'Please choose at least one drug class',
            dom: 'Please provide Manufacture date',
            doe: 'Please provide Expiring date',
            address: {
                required: "We need the Address of Site of Manufacture",
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