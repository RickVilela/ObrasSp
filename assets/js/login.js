const lembrar = localStorage.getItem("lembrar");;

$(document).ready(() =>{
   if(lembrar){
        window.location.href = "http://localhost/ObrasSP/admin.php";
   }
})

$("#btnLogin").on("click", () => {
    const emailValue = $("#email").val();
    const senhaValue = $("#senha").val();

    $.ajax({
        url: "validate-login.php",
        type: "POST",
        data: {
        email: emailValue,
        senha: senhaValue
        },
        success: function (response){
            if( $("#customCheck").is(":checked")){
                localStorage.setItem("lembrar", "sim");
            }

            if(response == "http://localhost/ObrasSP/admin.php"){
                window.location.href = response;
            }else if(emailValue == '' && senhaValue == ''){
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
                    title: 'Preencha todos os campos!'
                  })
            }else{
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
                    title: 'E-mail ou senha inválidos!'
                  })
            }
            
        },error: function(err){
            console.log(err)
        }
    })
})