(function ($) {
    'use strict';
    $(function () {
        var body = $('body');
        var contentWrapper = $('.content-wrapper');
        var scroller = $('.container-scroller');
        var footer = $('.footer');
        var sidebar = $('.sidebar');
        var navbar = $('.navbar').not('.top-navbar');


        //Add active class to nav-link based on url dynamically
        //Active class can be hard coded directly in html file also as required

        function addActiveClass(element) {
            if (current === "") {
                //for root url
                if (element.attr('href').indexOf("index.html") !== -1) {
                    element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                }
            } else {
                //for other url
                if (element.attr('href').indexOf(current) !== -1) {
                    element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                    if (element.parents('.submenu-item').length) {
                        element.addClass('active');
                    }
                }
            }
        }

        var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
        $('.nav li a', sidebar).each(function () {
            var $this = $(this);
            addActiveClass($this);
        })

        //Close other submenu in sidebar on opening any

        sidebar.on('show.bs.collapse', '.collapse', function () {
            sidebar.find('.collapse.show').collapse('hide');
        });


        //Change sidebar and content-wrapper height
        applyStyles();

        function applyStyles() {
            //Applying perfect scrollbar
        }

        $('[data-toggle="minimize"]').on("click", function () {
            if (body.hasClass('sidebar-toggle-display')) {
                body.toggleClass('sidebar-hidden');
            } else {
                body.toggleClass('sidebar-icon-only');
            }
        });

        //checkbox and radios
        $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');


        // fixed navbar on scroll
        $(window).scroll(function () {
            if (window.matchMedia('(min-width: 991px)').matches) {
                if ($(window).scrollTop() >= 197) {
                    $(navbar).addClass('navbar-mini fixed-top');
                    $(body).addClass('navbar-fixed-top');
                } else {
                    $(navbar).removeClass('navbar-mini fixed-top');
                    $(body).removeClass('navbar-fixed-top');
                }
            }
            if (window.matchMedia('(max-width: 991px)').matches) {
                $(navbar).addClass('navbar-mini fixed-top');
                $(body).addClass('navbar-fixed-top');
            }
        });
    });
    $.fn.extend({
        // With every keystroke capitalize first letter of ALLwords in the text
        upperFirstAll: function () {
            $(this).keyup(function (event) {
                var box = event.target;
                var txt = $(this).val();
                var start = box.selectionStart;
                var end = box.selectionEnd;
                $(this).val(txt.toLowerCase().replace(/^(.)|(\s|\-)(.)/g,
                        function (c) {
                            return c.toUpperCase();
                        }));
                box.setSelectionRange(start, end);
            });
            return this;
        },
        // With every keystroke capitalize first letter of theFIRST word in the text
        upperFirst: function () {
            $(this).keyup(function (event) {
                var box = event.target;
                var txt = $(this).val();
                var start = box.selectionStart;
                var end = box.selectionEnd;
                $(this).val(txt.toLowerCase().replace(/^(.)/g,
                        function (c) {
                            return c.toUpperCase();
                        }));
                box.setSelectionRange(start, end);
            });
            return this;
        },
        // Converts with every keystroke the hole text tolowercase
        lowerCase: function () {
            $(this).keyup(function (event) {
                var box = event.target;
                var txt = $(this).val();
                var start = box.selectionStart;
                var end = box.selectionEnd;
                $(this).val(txt.toLowerCase());
                box.setSelectionRange(start, end);
            });
            return this;
        },
        // Converts with every keystroke the hole text touppercase
        upperCase: function () {
            $(this).keyup(function (event) {
                var box = event.target;
                var txt = $(this).val();
                var start = box.selectionStart;
                var end = box.selectionEnd;
                $(this).val(txt.toUpperCase());
                box.setSelectionRange(start, end);
            });
            return this;
        }
    });
    $.fn.Save = function (opt) {
        var settings = $.extend({
            url: "../api/api_process?save",
            mode: 'alert',
            clearAfterAdd: true,
            data: {'val': 'y', 'val1': ''},
            optional: {image: false, boxsize: "small", title: 'save'}
        }, opt);
        var $formid = $(this);
        return new Promise(r => {
            try {
                var dialog = bootbox.dialog({
                    title: loadtitle(settings.optional.title),
                    message: '<div id="loader-bar"><div class="loadbar"></div><div class="loadbar"></div><div class="loadbar"></div></div>Please wait...',
                    size: settings.optional.boxsize
                });
                // dialog.init(function() {
                $.ajax({
                    url: settings.url,
                    type: "POST",
                    processData: false, //important
                    contentType: false, //important
                    dataType: 'json',
                    data: settings.data,
                    success: function (rs)
                    {
                        try {
                            if ("undefined" === typeof rs.status) {
                                throw "Unkown error occured";
                            }
                            if (rs.status === 1702) {
                                throw rs.msg;
                            }
                            if (rs.status === 1703) {
                                window.location = rs.url;
                            }
                            dialog.find(".modal-title").html(donetitle(settings.optional.title));
                            dialog.find(".bootbox-body").html(rs.msg);
                            if (settings.clearAfterAdd === true) {
                                $formid.trigger("reset");
                                $formid.find("select").val([]).trigger("change");
                                if (settings.optional.image === true) {
                                    resetImage($formid);
                                }
                            }
                            r(rs.data);
                        } catch (Error) {
                            dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alert"></i>Failed!</span>');
                            dialog.find(".bootbox-body").html(Error);
                            r(false);
                        }
                    },
                    error: function (x, t, m) {
                        var msg = x + " " + t + " " + m;
                        dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alert"></i>Error!</span>');
                        dialog.find(".bootbox-body").html('<i class ="mdi mdi-hand-pointing-right text-danger"></i> ' + msg);
                        r(false);
                    }
                });
                //});
            } catch (err) {
                dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Error!</span>');
                dialog.find(".bootbox-body").html('<i class ="mdi mdi-hand-pointing-right text-danger"></i> ' + err);
                r(false);
            }
        });
    };
//    $('.inmate_form').Save();
})(jQuery);
function msgBox(opt) {
    var settings = $.extend({
        msg: "Default Message",
        className: "bb-alternate-modal",
        size: "",
        backdrop: true,
        type: "info"
    }, opt);
    bootbox.alert({
        title: boxtitle(settings.type),
        message: settings.msg,
        className: settings.className,
        backdrop: settings.backdrop,
        size: settings.size, buttons: {
            ok: {
                label: '<i class="mdi mdi-check"></i> Ok',
                className: 'btn btn-primary btn-xs'
            }
        }
    });
}
function Save(opt) {
    var settings = $.extend({
        url: "../api/api_process?save",
        mode: 'alert',
        data: {'val': 'y', 'val1': ''},
        optional: {image: false, boxsize: "small", title: 'save'}
    }, opt);
    try {
        var dialog = bootbox.dialog({
            title: loadtitle(settings.optional.title),
            message: '<div id="loader-bar"><div class="loadbar"></div><div class="loadbar"></div><div class="loadbar"></div></div>Please wait...',
            size: settings.optional.boxsize
        });
        // dialog.init(function() {
        $.ajax({
            url: settings.url,
            type: "POST",
            processData: false, //important
            contentType: false, //important
            dataType: 'json',
            data: settings.data,
            success: function (rs)
            {
                try {
                    if ("undefined" === typeof rs.status) {
                        throw "Unkown error occured";
                    }
                    if (rs.status === 1702) {
                        throw rs.msg;
                    }
                    if (rs.status === 1703) {
                        window.location = rs.url;
                    }
                    dialog.find(".modal-title").html(donetitle(settings.optional.title));
                    dialog.find(".bootbox-body").html(rs.msg);
                    return rs.status;
                } catch (Error) {
                    dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Failed!</span>');
                    dialog.find(".bootbox-body").html(Error);
                }
            },
            error: function (x, t, m) {

                var msg = x + " " + t + " " + m;
                if (m === "Not Found")
                    msg = "URL not found";
                dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Error!</span>');
                dialog.find(".bootbox-body").html('<i class ="mdi mdi-hand-pointing-right text-danger"></i> ' + msg);
            }
        });
        //});
    } catch (err) {
        alert(err);
        dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Error!</span>');
        dialog.find(".bootbox-body").html('<i class ="mdi mdi-hand-pointing-right text-danger"></i> ' + err);
    }
}
function getHTMLData(options) {
    var settings = $.extend({
        url: "../api/api_process?save",
        data: {}
    }, options);
    return new Promise(r => {
        $.ajax({
            url: settings.url,
            type: "GET",
            data: settings.data,
            success: function (html) {
                r(html);
            }, error: () => {
                r('<option value="" selected>Select L.G.A</option>');
            }
        });
    });
}
function getHTML(options) {
    var settings = $.extend({
        url: "../api/api_process?save",
        data: {}
    }, options);
    return new Promise(r => {
        $.ajax({
            url: settings.url,
            type: "POST",
            data: settings.data,
            processData: false, //important
            contentType: false, //important
            success: function (html) {
                r(html);
            }, error: () => {
                r('<div class="text-danger">No drug or food dound!</div>');
            }
        });
    });
}
function getJSON(options) {
    var settings = $.extend({
        url: "../api/api_process?save",
        data: {}
    }, options);
    return new Promise(r => {
        $.ajax({
            url: settings.url,
            type: "GET",
            data: settings.data,
            success: function (json) {
                r(JSON.parse(json));
            }, error: () => {
                r({});
            }
        });
    });
}
function loadtitle(type) {
    switch ($.trim(type).toLowerCase()) {
        case 'load':
            return '<div class="text-primary"><i class="mdi mdi-check-circle text-danger"></i> Loading...</div>';
            break;
        case 'save':
            return '<div class="text-primary"><i class="mdi mdi-content-save text-danger"></i> Saving...</div>';
            break;
        case 'delete':
            return '<div class="text-primary"><i class="mdi mdi-close-circle text-danger"></i> Deleteing...</div>';
            break;
        case 'update':
            return '<div class="text-primary"><i class="mdi mdi-pencil text-danger"></i> Updating...</div>';
            break;
        case 'upload':
            return '<div class="text-primary"><i class="mdi mdi-cloud-upload text-danger"></i> Uploading...</div>';
            break;

        case 'post':
            return '<div class="text-primary"><i class="mdi mdi-send text-danger"></i> Posting...</div>';
            break;
        case 'submit':
            return '<div class="text-primary"><i class="mdi mdi-cloud-upload text-danger"></i> Submitting...</div>';
            break;
        case 'create':
            return '<div class="text-primary"><i class="mdi mdi-plus-circle text-danger"></i> Creating...</div>';
            break;
        default:
            return '<div class="text-primary"><i class="mdi mdi-pause text-danger"></i> Loading...</div>';
            break;
    }
}
function donetitle(type) {
    switch ($.trim(type).toLowerCase()) {
        case 'load':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Loaded!</span>';
            break;
        case 'save':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Saved!</span>';
            break;
        case 'delete':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Deleted!</span>';
            break;
        case 'update':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Updated!</span>';
            break;
        case 'upload':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Uploaded!</span>';
            break;
        case 'import':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Imported!</span>';
            break;
        case 'download':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Dounloaded!</span>';
            break;
        case 'post':
            return '<span class="text-success"><i class ="mdi mdi-send"></i>Posted!</span>';
            break;
        case 'submit':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Submitted!</span>';
            break;
        case 'create':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Created!</span>';
            break;
        case 'compile':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Compiled!</span>';
            break;
        case 'publish':
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Published!</span>';
            break;
        default:
            return '<span class="text-success"><i class ="mdi mdi-check-circle"></i>Loaded!</span>';
            break;
    }
}
function boxtitle(type) {
    switch ($.trim(type).toLowerCase()) {
        case 'info':
            return '<div class="text-primary"><i class="mdi mdi-information text-primary"></i> Attention!</div>';
            break;
        case 'error':
            return '<div class="text-danger"><i class="mdi mdi-alert text-danger"></i> Error!</div>';
            break;
        case 'warning':
            return '<div class="text-danger"><i class="mdi mdi-alert text-danger"></i>  Warning!</div>';
            break;
        case 'ok':
            return '<div class="text-primary"><i class="mdi mdi-thumb-up text-primary"></i> Ok</div>';
            break;
        case 'success':
            return '<div class="text-success"><i class="mdi mdi-check-circle text-success"></i> Success</div>';
            break;
        case 'confirm':
            return '<div class="text-danger"><i class="mdi mdi-alert text-danger"></i> Confirmation</div>';
            break;
        default:
            return '<div class="text-danger"><i class="mdi mdi-alert text-danger"></i> Attention</div>';
            break;
    }
}
function Delete(opt) {
    var settings = $.extend({
        url: "../api/api_process?save",
        data: {'val': 'y', 'val1': ''},
        optional: {image: false, boxsize: "small", title: 'delete'}
    }, opt);
    return new Promise(r => {
        try {
            var dialog = bootbox.dialog({
                title: loadtitle(settings.optional.title),
                message: '<div id="loader-bar"><div class="loadbar"></div><div class="loadbar"></div><div class="loadbar"></div></div>Please wait...',
                size: settings.optional.boxsize
            });
            // dialog.init(function() {
            $.ajax({
                url: settings.url,
                type: "POST",
                processData: false, //important
                contentType: false, //important
                dataType: 'json',
                data: settings.data,
                success: function (rs)
                {
                    try {
                        if ("undefined" === typeof rs.status) {
                            throw "Unkown error occured";
                        }
                        if (rs.status === 1702) {
                            throw rs.msg;
                        }
                        if (rs.status === 1703) {
                            window.location = rs.url;
                        }
                        dialog.find(".modal-title").html(donetitle(settings.optional.title));
                        dialog.find(".bootbox-body").html(rs.msg);
                        r(true);
                    } catch (Error) {
                        dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alert"></i>Failed!</span>');
                        dialog.find(".bootbox-body").html(Error);
                        r(false);
                    }
                },
                error: function (x, t, m) {
                    var msg = x + " " + t + " " + m;
                    dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alert"></i>Error!</span>');
                    dialog.find(".bootbox-body").html('<i class ="mdi mdi-alert text-danger"></i> ' + msg);
                    r(false);
                }
            });
            //});
        } catch (err) {
            dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alert"></i>Error!</span>');
            dialog.find(".bootbox-body").html('<i class ="mdi mdi-alert text-danger"></i> ' + err);
            r(false);
        }
    });
}
function Update(opt) {
    var settings = $.extend({
        url: "../api/api_process?save",
        mode: 'alert',
        data: {'val': 'y', 'val1': ''},
        optional: {image: false, boxsize: "small", title: 'update'}
    }, opt);
    return new Promise(r => {
        try {
            var dialog = bootbox.dialog({
                title: loadtitle(settings.optional.title),
                message: '<div id="loader-bar"><div class="loadbar"></div><div class="loadbar"></div><div class="loadbar"></div></div>Please wait...',
                size: settings.optional.boxsize
            });
            // dialog.init(function() {
            $.ajax({
                url: settings.url,
                type: "POST",
                processData: false, //important
                contentType: false, //important
                dataType: 'json',
                data: settings.data,
                success: function (rs)
                {
                    try {
                        if ("undefined" === typeof rs.status) {
                            throw "Unkown error occured";
                        }
                        if (rs.status === 1702) {
                            throw rs.msg;
                        }
                        if (rs.status === 1703) {
                            window.location = rs.url;
                        }
                        dialog.find(".modal-title").html(donetitle(settings.optional.title));
                        dialog.find(".bootbox-body").html(rs.msg);
                        r(true);
                    } catch (Error) {
                        dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Failed!</span>');
                        dialog.find(".bootbox-body").html(Error);
                        r(false);
                    }
                },
                error: function (x, t, m) {

                    var msg = x + " " + t + " " + m;
                    if (m === "Not Found")
                        msg = "URL not found";
                    dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Error!</span>');
                    dialog.find(".bootbox-body").html('<i class ="mdi mdi-hand-pointing-right text-danger"></i> ' + msg);
                    r(false);
                }
            });
            //});
        } catch (err) {
            dialog.find(".modal-title").html('<span class="text-danger"><i class ="mdi mdi-alerte"></i>Error!</span>');
            dialog.find(".bootbox-body").html('<i class ="mdi mdi-hand-pointing-right text-danger"></i> ' + err);
            r(false);
        }
    });
}

function confirm(opt) {
    var x = $.extend({
        title: '<div class="text-danger"><i class="mdi mdi-alert text-danger"></i> Confirmation</div>',
        message: 'message',
        size: 'small',
        btn: {confirmText: '<i class="mdi mdi-check"></i> Yes', cancelText: '<i class="mdi mdi-close"></i> No', cancelClass: 'btn btn-inverse-dark btn-xs', confirmClass: 'btn btn-primary btn-xs'}
    }, opt);
    return new Promise(r => {
        bootbox.confirm({
            title: x.title,
            message: `<i class ="mdi mdi-hand-pointing-right text-primary"></i> ${x.message}`,
            size: x.size,
            buttons: {
                cancel: {
                    label: x.btn.cancelText,
                    className: x.btn.cancelClass
                },
                confirm: {
                    label: x.btn.confirmText,
                    className: x.btn.confirmClass
                }
            }, callback: function (response) {
                r(response);
            }
        });
    });
}
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
    drawFace(ctx, radius);
    drawNumbers(ctx, radius);
    drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
    var grad;
    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, 2 * Math.PI);
    ctx.fillStyle = 'white';
    ctx.fill();
    grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
    grad.addColorStop(0, '#333');
    grad.addColorStop(0.5, 'white');
    grad.addColorStop(1, '#333');
    ctx.strokeStyle = grad;
    ctx.lineWidth = radius * 0.1;
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
    ctx.fillStyle = '#333';
    ctx.fill();
}

function drawNumbers(ctx, radius) {
    var ang;
    var num;
    ctx.font = radius * 0.15 + "px arial";
    ctx.textBaseline = "middle";
    ctx.textAlign = "center";
    for (num = 1; num < 13; num++) {
        ang = num * Math.PI / 6;
        ctx.rotate(ang);
        ctx.translate(0, -radius * 0.85);
        ctx.rotate(-ang);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(ang);
        ctx.translate(0, radius * 0.85);
        ctx.rotate(-ang);
    }
}

function drawTime(ctx, radius) {
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour = hour % 12;
    hour = (hour * Math.PI / 6) +
            (minute * Math.PI / (6 * 60)) +
            (second * Math.PI / (360 * 60));
    drawHand(ctx, hour, radius * 0.5, radius * 0.07);
    //minute
    minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
    drawHand(ctx, minute, radius * 0.8, radius * 0.07);
    // second
    second = (second * Math.PI / 30);
    drawHand(ctx, second, radius * 0.9, radius * 0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0, 0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}