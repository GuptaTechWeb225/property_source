"use strict";

$(document).ready(function () {
    $(".change-role").on("change", function (e) {
        e.preventDefault();

        var url = $("#url").val();
        var role_id = $(this).val();

        var formData = {
            role_id: role_id,
        };
        $.ajax({
            type: "GET",
            dataType: "html",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url + "/users/change-role",
            success: function (data) {
                $("#permissions-table tbody").html(data);
            },
            error: function (data) {},
        });
    });

    $(".change-module").on("change", function (e) {
        e.preventDefault();
        var url = $("#url").val();
        var code = $("#code").val();
        var module = $(this).val();

        var formData = {
            code: code,
            module: module,
        };
        $.ajax({
            type: "GET",
            dataType: "html",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url + "/languages/change-module",
            success: function (data) {
                $("#terms-form .term-translated-language").html(data);
            },
            error: function (data) {},
        });
    });
});

$(document).on("click", ".common-key", function () {
    var value = $(this).val();
    var value = value.split("_");
    if (value[1] == "read") {
        if (!$(this).is(":checked")) {
            $(this).closest("tr").find(".common-key").prop("checked", false);
        }
    } else {
        if ($(this).is(":checked")) {
            $(this)
                .closest("tr")
                .find(".common-key")
                .first()
                .prop("checked", true);
        }
    }
});

// slider js
$(document).ready(function () {
    $("._common_div").hide();
    let type = $(".file_system").val();
    if (type == "s3") {
        $("._common_div").show();
    } else {
        $("._common_div").hide();
    }

    $(".file_system").on("change", function () {
        let type = $(this).val();
        if (type == "s3") {
            $("._common_div").show(); // show product div
        } else {
            $("._common_div").hide(); // show category div
        }
    });
});

$(document).ready(function () {
    $(".language-change").on("change", function (e) {
        var _token = $('meta[name="csrf-token"]').attr("content");

        let selected_lang = $(this).val();
        $.ajax({
            url: $("#change_lang_url").val(),
            type: "POST",
            data: {
                lang: selected_lang,
                _token,
            },
            success: function (data) {
                if (data.success) {
                    //page reload
                    location.reload();
                    toastr.success(data.message, "Success");
                } else {
                    toastr.error(data.message, "Error");
                }
            },
        });
    });

    $("input[name='theme_mode']").on("change", function (e) {
        var url = $("#url").val();
        var theme_mode = $(this).val();

        var formData = {
            theme_mode: theme_mode,
        };
        $.ajax({
            type: "POST",
            dataType: "html",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url + "/setting/change-theme",
            success: function (data) {
                if (data) {
                    if (theme_mode == "dark-theme") {
                        $("#dark_logo").show();
                        $("#default_logo").hide();
                    } else {
                        $("#dark_logo").hide();
                        $("#default_logo").show();
                    }
                    // location.reload();
                }
            },
            error: function (data) {},
        });
    });

    // end
});

/*----------------------------------------------
    Nice Scroll js
----------------------------------------------*/
$(".niceScroll").niceScroll({});

/*----------------------------------------------
    Plugin Activision
    --Odometer Counter--
----------------------------------------------*/
$(".odometer").appear(function (e) {
    var odo = jQuery(".odometer");
    odo.each(function () {
        var countNumber = jQuery(this).attr("data-count");
        jQuery(this).html(countNumber);
    });
});

$(document).on("keyup", "#menuSearch", function () {
    var url = $("#url").val();
    var searchData = $(this).val();

    if (searchData != "") {
        $.ajax({
            url: url + "/searchMenuData",
            type: "post",
            dataType: "json",
            data: { searchData: searchData },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                $("#autoCompleteData").removeClass("d-none").html(data.data);
            },
        });
    } else {
        $("#autoCompleteData").html("");
    }
});

$(document).on("focusout", "#menuSearch", function () {
    $("#autoCompleteData").addClass("d-nones");
});

// Full screen
function toggleFullScreen() {
    if (
        (document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)
    ) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(
                Element.ALLOW_KEYBOARD_INPUT
            );
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}
(function ($, window, document, undefined) {
    "use strict";
    var $ripple = $(".js-ripple");
    $ripple.on("click.ui.ripple", function (e) {
        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find(".c-ripple__circle");
        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;
        $circle.css({
            top: y + "px",
            left: x + "px",
        });
        $this.addClass("is-active");
    });
    $ripple.on(
        "animationend webkitAnimationEnd oanimationend MSAnimationEnd",
        function (e) {
            $(this).removeClass("is-active");
        }
    );
})(jQuery, window, document);

function reinitializeNiceSelect() {
    $(".nice-select").niceSelect("destroy");
    $(".nice-select").niceSelect();
}
