function equalize() {
    $(".equalizer").each(function() {
        var heights = $(this).find("div").map(function() {
            return $(this).outerHeight();
        }).get(), maxHeight = Math.max.apply(null, heights);

        $(this).find("div").outerHeight(maxHeight);
    });
}

$(document).ready(equalize());
$(window).on("resize", equalize)