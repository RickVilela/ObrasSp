$(document).ready(() => {
    $.ajax({
        url: "get-partner.php",
        mimeType: "text/html; charset=utf-8",
        success: function(result){
        $(".parceiro-card").html(result)
           
        }, 
        error: function(err){
            console.log(err);
        }
    })
})


