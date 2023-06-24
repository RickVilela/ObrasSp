$(document).ready(() => {
    $.ajax({
        url: "get-partner-details-cards.php",
        mimeType: "text/html; charset=utf-8",
        success: function (result) {

            $(".card-partners").html(result)

        },
        error: function (err) {
            console.log(err);
        }
    })
})
