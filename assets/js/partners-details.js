$(document).ready(() => {
    $.ajax({
        url: "get-partner-details.php",
        dataType: "json",
        success: function(result){
            console.log(result);
        }, 
        error: function(err){
            console.log(err);
        }
    })

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

  var id = queryString("id");
   

    $.ajax({
        url: "get-partner-details.php",
        type: "POST",
        data: {
            id: id
        },
        success: function (response){
            $("#nomeEmpresa").html(response.nomeEmpresa);
            $("#nomeResponsavel").html(response.nomeResponsavel);
            $("#descricao").html(response.descricao);
            $("#categoria").html(response.categoria);

        },error: function(err){
            console.log(err)
        }
    })
})