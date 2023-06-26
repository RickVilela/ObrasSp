$(document).ready(() => {
    $.ajax({
        url: "get-partner-admin.php",
        mimeType: "text/html; charset=utf-8",
        success: function(result){

        $(".dados-tabela").html(result);
           
        }, 
        error: function(err){
            console.log(err);
        }
    })
})

function editar(id){
    console.log(id)

    //Recuperar Valores 
  var nomeEmpresa = document.getElementById("valor_nomeEmpresa" + id);
  var nomeResponsavel = document.getElementById("valor_nomeResponsavel" + id);
  var endereco = document.getElementById("valor_endereco" + id);
  var cidade = document.getElementById("valor_cidade" + id);
  var estado = document.getElementById("valor_estado" + id);
  var cep = document.getElementById("valor_cep" + id);
  var categoria = document.getElementById("valor_categoria" + id);

  nomeEmpresa.innerHTML= "<input type='text' id='nomeEmpresa_text" + id + "' value='" + nomeEmpresa.innerHTML + "'>";
  nomeResponsavel.innerHTML= "<input type='text' id='nomeResponsavel_text" + id + "' value='" + nomeResponsavel.innerHTML + "'>";
  endereco.innerHTML= "<input type='text' id='endereco_text" + id + "' value='" + endereco.innerHTML + "'>";
  cidade.innerHTML= "<input type='text' id='cidade_text" + id + "' value='" + cidade.innerHTML + "'>";
  estado.innerHTML= "<input type='text' id='estado_text" + id + "' value='" + estado.innerHTML + "'>";
  cep.innerHTML= "<input type='text' id='cep_text" + id + "' value='" + cep.innerHTML + "'>";
  categoria.innerHTML= "<input type='text' id='categoria_text" + id + "' value='" + categoria.innerHTML + "'>";

}

async function salvar(id){
    var nomeEmpresa_valor = document.getElementById("nomeEmpresa_text" + id).value;
    var nomeResponsavel_valor = document.getElementById("nomeResponsavel_text" + id).value;
    var endereco_valor = document.getElementById("endereco_text" + id).value;
    var cidade_valor = document.getElementById("cidade_text" + id).value;
    var estado_valor = document.getElementById("estado_text" + id).value;
    var cep_valor = document.getElementById("cep_text" + id).value;
    var categoria_valor = document.getElementById("categoria_text" + id).value;

    //Substituir o texto pelo novo valor
    document.getElementById("valor_nomeEmpresa" + id).innerHTML = nomeEmpresa_valor;
    document.getElementById("valor_nomeResponsavel" + id).innerHTML = nomeResponsavel_valor;
    document.getElementById("valor_endereco" + id).innerHTML = endereco_valor;
    document.getElementById("valor_cidade" + id).innerHTML = cidade_valor;
    document.getElementById("valor_estado" + id).innerHTML = estado_valor;
    document.getElementById("valor_cep" + id).innerHTML = cep_valor;
    document.getElementById("valor_categoria" + id).innerHTML = categoria_valor;

    $.ajax({
        url: "edit.php",
        type: "POST",
        data: {
            nomeEmpresa: nomeEmpresa_valor,
            nomeResponsavel: nomeResponsavel_valor,
            endereco: endereco_valor,
            cidade: cidade_valor,
            estado: estado_valor,
            cep: cep_valor,
            categoria: categoria_valor,
            id: id
        },
        success: function (response){
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
                title: 'Alterado com Sucesso!'
              })

        },error: function(err){
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
                title: 'Erro ao Alterar!'
              })
        }
    })

}

function excluir(id){

    Swal.fire({
        title: 'Deseja Remover?',
        text: "Nao sera possivel Reverter!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "remove-partner.php",
                type: "POST",
                mimeType: "text/html; charset=utf-8",
                data: {
                    id: id
                },
                success: function (response){
                  $.ajax({
                    url: "get-partner-admin.php",
                    mimeType: "text/html; charset=utf-8",
                    success: function(result){
            
                    $(".dados-tabela").html(result);
                       
                    }, 
                    error: function(err){
                        console.log(err);
                    }
                })
        
                },error: function(err){
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
                        title: 'Erro ao Remover!'
                      })
                }
            })


          Swal.fire(
            'Removido!',
            'Parceiro Removido com Sucesso',
            'success'
          )

         
        }
      })
}



$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});




