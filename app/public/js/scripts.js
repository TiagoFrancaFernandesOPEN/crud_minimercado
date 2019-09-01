function scrollToID(aid) {
  var aTag = jQuery("#" + aid);
  if (aTag.length) {
    jQuery('html,body').animate({ scrollTop: aTag.offset().top }, 'slow');
  }else{
    console.log('Nenhum item com o ID "'+aid+'"');
  };
}

var key = 'p', value = 'start', here = window.location.href;
function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  } else {
    return uri + separator + key + "=" + value;
  }
}
var goToStart = updateQueryStringParameter(here, key, value);



function adicionaZeros(numero) {
  numero = parseInt(numero);
  if (numero == null || numero == "") {
    numero = "";
  } else if (numero >= 10 && numero < 100) {
    numero = "0" + numero;
  } else if (numero >= 1 && numero < 10) {
    numero = "00" + numero;
  } else {
    numero = numero;
  };
  return numero;
}

function zeroParaUnidades(num) {
  var n = parseInt(adicionaZeros(num));
  if (num == 0) {
    return '00';
  } else if (n > 0 && n < 10) {
    return '0' + n;
  } else { return n; }
}

dataHora = new Date();
diaMesAno = zeroParaUnidades(dataHora.getDate()) + "/" +  zeroParaUnidades(dataHora.getMonth()) + "/" + dataHora.getFullYear();
// horaMinSeg = zeroParaUnidades(dataHora.getHours()) + ":" +  zeroParaUnidades(dataHora.getMinutes()) + ":" + zeroParaUnidades(dataHora.getSeconds());
function horaMinSeg() {
  var dataHora = new Date();
  return zeroParaUnidades(dataHora.getHours()) + ":" + zeroParaUnidades(dataHora.getMinutes()) + ":" + zeroParaUnidades(dataHora.getSeconds());
}

function iniciaRelogio(){
  var _relogioSec = setInterval(relogioSegundos, 1000);
  function relogioSegundos() {
    var d = new Date();
    jQuery('#horaAtual').val(d.toLocaleTimeString('pt-BR'));
  }
}

function piscarElemento(queryCss,color='red'){
  var id = jQuery(queryCss); // div id=1
  var color = color; // color to highlight
  var delayms = "800"; // mseconds to stay color
  $(id).css("backgroundColor", color)
    .css("transition", "all 0.5s ease") // you may also (-moz-*, -o-*, -ms-*) e.g
    .css("backgroundColor", color).delay(delayms).queue(function () {
      $(id).css("backgroundColor", "");
      $(id).dequeue();
    }); 
}
function promptGoToStart() {
  if (!confirm('Deseja sair da tela de vendas?')) {
    return false;
  } else {
    window.location.href = goToStart;
  }
}

//Adiconar eventos ao carregar a página
jQuery(document).ready(function () {  

  jQuery('.go.btnGoToStart').on('click', function () {
    window.location.href = goToStart;
  });

  // jQuery(".toTop").click(function () {
  //   jQuery('html, body').animate({
  //     scrollTop: jQuery("#topIsHere").offset().top
  //   }, 1000);
  // });

  jQuery(".toTop").click(function () {
    scrollToID('topIsHere');
  });
  iniciaRelogio();
});
