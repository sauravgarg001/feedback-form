$(function() {
    //To get value of rating use "<id>Rating" id or name
    $(".star-rating").each(function() {
        let id = $(this).prop("id");
        $(this).html("");
        for (let i = 1; i <= 5; i++) {
            let checkbox = $("<input>");
            $(checkbox)
                .attr("type", "checkbox")
                .attr("id", id + "Rating" + i)
                .addClass("rating")
            let label = $("<label>");
            $(label)
                .attr("for", id + "Rating" + i)
            $(this).append($(checkbox));
            $(this).append($(label));
        }
        let number = $("<input>");
        $(number)
            .attr("type", "number")
            .attr("id", id + "Rating")
            .attr("name", id + "Rating")
            .val(0).hide();
        $(this).append($(number));
    });
    $("#body").show();
    $("#spinner").hide();

    $(".rating").change(function() {
        let id = $(this).prop("id");
        let rating = id[id.length - 1];
        let divId = id.substring(0, id.length - 1);
        let reviewid = divId.substring(0, divId.indexOf("Rating")) + "Text";
        $("#" + reviewid).slideDown();
        $("#" + reviewid).focus();

        $(this).parent().find("#" + divId).val(rating);
        for (let i = 1; i <= 5; i++) {
            if (i > rating)
                $("#" + divId + i).prop("checked", false);
            else
                $("#" + divId + i).prop("checked", true);
        }

    });
    $(".rating+label").hover(function() {
        let id = $(this).prev().prop("id");
        let rating = id[id.length - 1];
        let divId = id.substring(0, id.length - 1);

        for (let i = 1; i <= rating; i++) {
            $("#" + divId + i + "+label").animate({
                height: "+=8px"
            }, 100);
        }
    }, function() {
        let id = $(this).prev().prop("id");
        let rating = id[id.length - 1];
        let divId = id.substring(0, id.length - 1);

        for (let i = 1; i <= rating; i++) {
            $("#" + divId + i + " + label ").animate({
                height: "-=8px"
            }, 50);
        }
    });
});