const xhr = new XMLHttpRequest();
const content = document.getElementById("content");

xhr.onload = function(){
  if(this.status === 200){
    content.innerHTML= xhr.responseText;

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
    
    var queryParam = queryString("text");
    
    console.log(queryParam);
    
    xhr.open('get', '../../obrassp/text/' + queryParam + '.html');
    xhr.send();

  }else{
    console.warn("Erro: " + this.status);
  }

  
};




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