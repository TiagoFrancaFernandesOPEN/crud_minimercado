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
  numero = (numero < 10) ? "00" + numero : numero;
  numero = (numero >= 10 && numero < 100) ? "0" + numero : numero;
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

//Adiconar eventos ao carregar a página
jQuery(document).ready(function () {
  jQuery('#itemSearch').focus();
  jQuery('.go.btnGoToStart').on('click', function () {
    window.location.href = goToStart;
  });
  jQuery('#itemSearch').on('change',function(){
    jQuery('#qtdItemSearch').val('1');
  });

  $(".toTop").click(function () {
    $('html, body').animate({
      scrollTop: $("#topIsHere").offset().top
    }, 1000);
  });

});