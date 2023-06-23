const btnCadastrar = $("#btnCadastrar");
const btnUpload = $("#upload");

btnUpload.on("click", (e) => {
    e.preventDefault();
})

btnCadastrar.on("click", (e) =>{

const nomeEmpresa = $("#nomeEmpresa").val();
const nomeResponsavel = $("#nomeResponsavel").val();
const descricao = $("#descricao").val();
const endereco = $("#endereco").val();
const cidade = $("#cidade").val();
const estado = $("#estado").val();
const cep = $("#cep").val();
const categoria = $("#categoria").val();


e.preventDefault();
   
$.ajax({
    url: "./cadastrar.php",
    type: "POST",
    data: {
        nomeEmpresa: nomeEmpresa, 
        nomeResponsavel: nomeResponsavel,
        descricao: descricao,
        endereco: endereco,
        cidade: cidade,
        estado: estado,
        cep: cep,
        categoria: categoria
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
    url: "get-partner.php",
    mimeType: "text/html; charset=utf-8",
    success: function(result){
    $(".parceiro-card").html(result)
       
    }, 
    error: function(err){
        console.log(err);
    }
})


function limparCampos(){
    $("#nomeEmpresa").val('');
    $("#nomeResponsavel").val('');
    $("#descricao").val('');
    $("#endereco").val('');
    $("#cidade").val('');
    $("#estado").val('');
    $("#cep").val('');
    $("#categoria").val('');
}
})

