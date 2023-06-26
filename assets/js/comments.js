$(document).ready(() => {

    function queryString(parameter) {  
        var loc = location.search.substring(1, location.search.length);   
        var param_value = false;   
        var params = loc.split("&");   
        for (i=0; i<params.length;i++) {   
            param_name = params[i].substring(0,params[i].indexOf('='));   
            if (param_name == parameter) {                                          
                param_value = params[i].substring(params[i].indexOf('=')+1)   
            }   
        }   
        if (param_value) {   
            return param_value;   
        }   
        else {   
            return false;   
        }   
  }

  const idPost = queryString("id");

    $.ajax({
        url: "get-comment.php",
        type: "POST",
        mimeType: "text/html; charset=utf-8",
        data: {
        id: idPost
        },
        success: function (response){
            $(".comment").html(response);
        },error: function(err){
            console.log(err)
        }
    })

    $("#btnComentar").on("click", (e) =>{
      e.preventDefault();
    
        const nome = $("#nome").val();
        const email = $("#email").val();
        const comentario = $("#comentario").val();  
    
        $.ajax({
            url: "./new-comment.php",
            type: "POST",
            mimeType: "text/html; charset=utf-8",
            data: {
                nome: nome, 
                email: email,
                comentario: comentario,
                id_post: idPost
            },
            success: function (response){
                console.log(response);

                $.ajax({
                    url: "get-comment.php",
                    type: "POST",
                    mimeType: "text/html; charset=utf-8",
                    data: {
                    id: idPost
                    },
                    success: function (response){
                        $(".comment").html(response);
                    },error: function(err){
                        console.log(err)
                    }
                })
                limparCampos();
            },error: function(err){
                limparCampos()
                console.log(err)
            }
        })
    
        function limparCampos(){
            $("#nome").val('');
            $("#email").val('');
            $("#comentario").val('');
        }
    })

})



