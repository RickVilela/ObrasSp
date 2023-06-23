$("#btnEnviarFormulario").on("click", () => {


            let nome = $("#nome").val();
            let email = $("#email").val();
            let celular = $("#celular").val();
            let mensagem = $("#mensagem").val();
    
            $.ajax({
                url: "./contato.php",
                type: "POST",
                data: {
                    nome: nome, 
                    email: email,
                    celular: celular,
                    message: mensagem
                },
                success: function (response){
    
                    limparCampos()
                    
                    if(response.error == false){
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
                            icon: 'success',
                            title: 'Enviado Com Sucesso!'
                          })
                        }
                },error: function(err){
    
                    console.log(err)
    
                    limparCampos()
                    
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
                            title: 'Erro ao Enviar! Verifique os dados'
                          })
                    }
            })
} ).trigger( "change" );

function limparCampos(){
    $("#nome").val('');
    $("#email").val('');
    $("#celular").val('');
    $("#mensagem").val('');
}
