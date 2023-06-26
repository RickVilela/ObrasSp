const btnCadastrar = $("#btnCadastrar");

btnCadastrar.on("click", (e) =>{

// const nomeEmpresa = $("#nomeEmpresa").val();
// const nomeResponsavel = $("#nomeResponsavel").val();
// const descricao = $("#descricao").val();
// const endereco = $("#endereco").val();
// const cidade = $("#cidade").val();
// const estado = $("#estado").val();
// const cep = $("#cep").val();
// const categoria = $("#categoria").val();

//     e.preventDefault();

//     $.ajax({
//         url: "upload.php",
//         type: "POST",
//         data: {
//             nomeEmpresa: nomeEmpresa, 
//             nomeResponsavel: nomeResponsavel,
//             descricao: descricao,
//             endereco: endereco,
//             cidade: cidade,
//             estado: estado,
//             cep: cep,
//             categoria: categoria
//         },
//         success: function (response){
//             console.log(response)

//             const Toast = Swal.mixin({
//                 toast: true,
//                 position: 'top-end',
//                 showConfirmButton: false,
//                 timer: 3000,
//                 timerProgressBar: true,
//                 didOpen: (toast) => {
//                 toast.addEventListener('mouseenter', Swal.stopTimer)
//                 toast.addEventListener('mouseleave', Swal.resumeTimer)
//                 }
//             })
        
//             Toast.fire({
//                 icon: 'success',
//                 title: 'Cadastrado com sucesso!'
//             })

//             limparCampos();

//         },error: function(err){

//             console.log(err)
//             limparCampos()
//         }
//         })
   
        $.ajax({
            url: "get-partner-index.php",
            mimeType: "text/html; charset=utf-8",
            success: function(result){

            $(".parceiro-card").html(result)
            
            }, 
            error: function(err){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })
            
                  Toast.fire({
                    icon: 'error',
                    title: 'Erro ao cadastrar!'
                  })
                limparCampos()
            }
        })

})

$("#exit").on("click" , () =>{
  $.ajax({
    url: "logout.php",
    success: function(result){
    
      console.log(result)
      window.location.href = (result)
    
    }, 
    error: function(err){
    }
  })
});

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
