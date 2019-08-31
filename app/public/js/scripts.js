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

function rolarPapelTermico()
{
  jQuery(".papelTermico").scrollTop(jQuery("#tabelaPapelTermico").height());
}

function adicionaZeros(numero)
{
  numero = parseInt(numero);
  if(numero == null || numero == ""){
    numero = "";
  }else if(numero >= 10 && numero < 100){
    numero = "0"+numero;
  }else if (numero >= 1 && numero < 10) {
    numero = "00" + numero;
  }else{
    numero = numero;
  };
  return numero;
}

function adicionarLinhaAoCupom()
{
  var itemSeqNum = jQuery('#tabelaPapelTermico tbody tr').length;
  itemSeqNum = itemSeqNum + 1; 
  itemSeqNum = adicionaZeros(itemSeqNum); 

  var linhaProduto = "<tr id='prodItemCupom_" + itemSeqNum +"'>"+
    "<td>----------------------------------------<br>"+
  itemSeqNum+"<span> 0001 PRODUTO DE TESTE R$1.00 x2 SUBTOTAL=R$2.00</span></td></tr>";
  jQuery('#tabelaPapelTermico > tbody').append(linhaProduto);
  rolarPapelTermico();
}

function removerItemDoCupom(id)
{
  var itemSeqNum = adicionaZeros(id);
  jQuery('#prodItemCupom_'+itemSeqNum+' > td > span').css('text-decoration','line-through')
}

function promptRemoverItemDoCupom() {
  var itemNoCupom = prompt("Informa o número do item a ser cancelado:", "");
  if (itemNoCupom != null || itemNoCupom != "") {
    removerItemDoCupom(adicionaZeros(itemNoCupom));
  } 
}

function promptGoToStart() { 
  if (! confirm('Deseja sair da tela de vendas?')) {
    return false;
  }else{
    window.location.href = goToStart;
  }
}

//Adiconar eventos ao carregar a página
jQuery(document).ready(function () {
  jQuery('#itemSearch').focus();

  jQuery('.go.btnGoToStart').on('click', function () {
    window.location.href = goToStart;
  });

  jQuery('#itemSearch').on('change',function(){
    jQuery('#qtdItemSearch').val('1');
  });

  // jQuery(".toTop").click(function () {
  //   jQuery('html, body').animate({
  //     scrollTop: jQuery("#topIsHere").offset().top
  //   }, 1000);
  // });

  jQuery(".toTop").click(function () {
    scrollToID('topIsHere');
  });

  jQuery(".go_acoes_venda").click(function () {
    scrollToID('acoes_venda');
  });

});
