const xhr = new XMLHttpRequest();
const content = document.getElementById("content");

xhr.onload = function(){
  if(this.status === 200){
    content.innerHTML= xhr.responseText;
  }else{
    console.warn("Erro: " + this.status);
  }
};

xhr.open('get', '../../obrassp/text/pintura.html');
xhr.send();

$("#pintura").on("click", () => {

  $("#pintura" ).addClass( "active" );
  xhr.open('get', '../../obrassp/text/pintura.html');
  xhr.send();
})

$("#materiais").on("click", () => {
  xhr.open('get', '../../obrassp/text/materiais.html');
  xhr.send();
})

$("#arquitetura").on("click", () => {
  xhr.open('get', '../../obrassp/text/arquitetura.html');
  xhr.send();
})

$("#alvenaria").on("click", () => {
  xhr.open('get', '../../obrassp/text/alvenaria.html');
  xhr.send();
})

$("#eletrica").on("click", () => {
  xhr.open('get', '../../obrassp/text/eletrica.html');
  xhr.send();
})

$("#ferramentas").on("click", () => {
  xhr.open('get', '../../obrassp/text/ferramentas.html');
  xhr.send();
})

$(function(){
  $('a').click(function(i){
      $('a').removeClass('active');
      $(this).addClass('active');
      $('.services-list').each(function(index) {
          $(this).toggleClass('active');
      });
  });
});