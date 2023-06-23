$(document).ready(() => {
    $.ajax({
        url: "get-comment.php",
        mimeType: "text/html; charset=utf-8",
        success: function(result){
        $(".comment").html(result)
           
        }, 
        error: function(err){
            console.log(err);
        }
    })
})

$("#btnComentar").on("click", (e) =>{
    e.preventDefault();

    const nome = $("#nome").val();
    const email = $("#email").val();
    const comentario = $("#comentario").val();

    $.ajax({
        url: "./new-comment.php",
        type: "POST",
        data: {
            nome: nome, 
            email: email,
            comentario: comentario
        },
        success: function (response){
            console.log(response)
            limparCampos()

        },error: function(err){
            limparCampos()
            console.log(err)
        }
    })

    $.ajax({
        url: "get-comment.php",
        mimeType: "text/html; charset=utf-8",
        success: function(result){
        $(".comment").html(result)
        }, 
        error: function(err){
            console.log(err);
        }
    })

    function limparCampos(){
        $("#nome").val('');
        $("#email").val('');
        $("#comentario").val('');
    }
})

