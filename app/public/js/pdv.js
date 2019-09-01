totalVenda=0;
apiURL = "//local.projetostestes/testesc/app/public/api/?api_action=";
impostos = jQuery.getJSON(apiURL + "listar_impostos&array=true",
  function (json) { impostos = json;});

function obterImposto(do_total, produto_tipo) {
  var imposto = function () {
    var tmp = null;
    $.ajax({
      'async': false,
      'type': "GET",
      'url': apiURL + "quanto_deduzir&do_total=" + do_total + "&produto_tipo=" + produto_tipo,
      'success': function (data) {
        tmp = data;
      }
    });
    return tmp;
  }();
  return imposto;
}

function atualizaTotalVenda()
{
  var totalVendaFormatado = formatBRL(totalVenda);  ;
  jQuery('#total_total_venda').val(totalVendaFormatado);
}

function somaTotalVenda(somar)
{
  totalVenda = totalVenda+somar;
  atualizaTotalVenda();
}

function subtrairTotalVenda(subtrair)
{
  if (totalVenda != 0 && totalVenda > 0 && totalVenda >= subtrair)
  {
    totalVenda = totalVenda-subtrair;
    atualizaTotalVenda();
  }
}

function formatBRL(valor) {
  var valorF = (valor).toLocaleString("pt-BR", { style: "currency", currency: "BRL", minimumFractionDigits: 2 });
  valorF = valorF.replace('R$ ', 'R$');
  return valorF;
}

function rolarPapelTermico()
{
  jQuery(".papelTermico").scrollTop(jQuery("#tabelaPapelTermico").height());
}

function adicionarLinhaAoCupom(obj)
{
  var itemSeqNum = jQuery('#tabelaPapelTermico tbody tr').length;
  itemSeqNum = itemSeqNum + 1; 
  itemSeqNum = adicionaZeros(itemSeqNum);
  
  var nome = obj.nome;
  var preco = parseInt(obj.preco);
  var imposto = obterImposto(obj.preco, obj.tipo);
  var cod_produto = obj.cod_produto;
  var qtd = jQuery('#qtdItemSearch').val();
  qtd = (qtd < 1 || qtd == 0 || qtd == '') ? 1 : qtd;
  var preco_X_qtd = preco * qtd;
  var subtotal = parseInt(preco_X_qtd) + parseInt(imposto);
  var impostoFormatado = formatBRL(parseInt(imposto));
  var precoFormatado = formatBRL(preco);
  var subtotalFormatado = formatBRL(subtotal);
  jQuery('#produtoInputSubtotal').val(subtotalFormatado);
  somaTotalVenda(subtotal);

  //ID: "1", cod_produto: "1472", nome: "produto 1472", preco: "60.00", status: "ativo"
  var linhaProduto = "<tr id='prodItemCupom_" + itemSeqNum +"'>"+
    "<td class='dashed'><span subtotal='"+subtotal+"'>"+itemSeqNum+"; "+cod_produto + 
    ";  &nbsp;" + nome + ";  &nbsp;" + precoFormatado + 
    " x" + qtd + " + " + impostoFormatado+"; TOTAL=" + subtotalFormatado+"</span></td></tr>";
  jQuery('#tabelaPapelTermico > tbody').append(linhaProduto);
  rolarPapelTermico();
}

function cancelarItemDoCupom(id) {
  var itemSeqNum = adicionaZeros(id);
  var item = jQuery('#prodItemCupom_' + itemSeqNum + ' > td > span');
  item.css('text-decoration', 'line-through');
  subtrairTotalVenda(item.attr('subtotal'));
  item.attr('subtotal','');
}

function populaDadosNoInput(obj)
{
  var preco = obj.preco;
  var qtd = jQuery('#qtdItemSearch').val();
  qtd = (qtd < 1 || qtd == 0 || qtd == '')?1:qtd;
  var subtotal = preco*qtd;
  precoFormatado = formatBRL(preco);
  subtotalFormatado = formatBRL(subtotal);
  jQuery('#produtoInputCod').val(obj.cod_produto);
  jQuery('#produtoInputQtd').val(qtd);
  jQuery('#produtoInputPreco').val(preco);
  jQuery('#produtoInput_nome_big').html(obj.nome);
  adicionarLinhaAoCupom(obj);
  jQuery('#qtdItemSearch').val('');
  jQuery('#itemSearch').val('');
  jQuery('#itemSearch').focus();
}

function promptCancelarItemDoCupom() {
  var itemNoCupom = prompt("Informa o número do item a ser cancelado:", "");
  if (itemNoCupom != null || itemNoCupom != "") {
    cancelarItemDoCupom(adicionaZeros(itemNoCupom));
  } 
}

function buscaEPopulaProduto()
{
  var api = apiURL + "listar_produtos&array=true";
  jQuery.getJSON(api, function (data) {
    datajson = data;

    jQuery.each(datajson, function (i, v) {
      var itemSearchVal = jQuery('#itemSearch').val();
      if (v.cod_produto == itemSearchVal) {
          populaDadosNoInput(v);
          piscarElemento('#itemSearch','green');
          return;
        }else{
          piscarElemento('#itemSearch');
          jQuery('#itemSearch').focus();
          return;
        }
    });
  });
}


//Registra ao carregar document
$(function () {

  jQuery('#itemSearch').focus();

  jQuery('#itemSearch').keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
      var itemSearchVal = jQuery('#itemSearch').val();
      console.log(itemSearchVal);
      if(itemSearchVal.length > 1)
      {
        buscaEPopulaProduto();
      }
      
    }
    event.stopPropagation();
  });    

  jQuery(".go_acoes_venda").click(function () {
    scrollToID('acoes_venda');
  });

  jQuery("#itemSearchAdd").click(function () {
    buscaEPopulaProduto();
  });

  jQuery('#itemSearch').on('change',function(){
    console.log('alterado pesquisa');
  });
  
  jQuery('#itemSearch').focus();
  jQuery('#horaAtual').val(horaMinSeg());

});