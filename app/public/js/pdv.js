var totalVenda=0;

function atualizaTotalVenda()
{
  var totalVendaFormatado = formatBRL(totalVenda);  ;
  jQuery('#total_total_venda').val(totalVendaFormatado);
}

function somaTotalVenda(somar)
{
  console.log(totalVenda);
  totalVenda = totalVenda+somar;
  console.log(totalVenda);
  atualizaTotalVenda();
}

function formatBRL(valor)
{
  var valorF = (valor).toLocaleString("pt-BR", { style: "currency", currency: "BRL", minimumFractionDigits: 2 });
  valorF = valorF.replace('R$ ','R$');
  return valorF;
}
function subtrairTotalVenda(subtrair)
{
  console.log(totalVenda);
  if (totalVenda != 0 && totalVenda > 0 && totalVenda >= subtrair)
  {
    console.log(totalVenda);
    totalVenda = totalVenda-subtrair;
    console.log(totalVenda);
    atualizaTotalVenda();
  }
}

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

function adicionarLinhaAoCupom(obj)
{
  var itemSeqNum = jQuery('#tabelaPapelTermico tbody tr').length;
  itemSeqNum = itemSeqNum + 1; 
  itemSeqNum = adicionaZeros(itemSeqNum);
  
  var nome = obj.nome;
  var preco = parseInt(obj.preco);
  var cod_produto = obj.cod_produto;
  var qtd = jQuery('#qtdItemSearch').val();
  qtd = (qtd < 1 || qtd == 0 || qtd == '')?1:qtd;
  var subtotal = preco*qtd;
  precoFormatado = formatBRL(preco);
  console.log(preco);
  console.log(subtotal);
  var subtotalFormatado = formatBRL(subtotal);
  somaTotalVenda(subtotal);

  //ID: "1", cod_produto: "1472", nome: "produto 1472", preco: "60.00", status: "ativo"
  var linhaProduto = "<tr id='prodItemCupom_" + itemSeqNum +"'>"+
    "<td>----------------------------------------<br>"+
    itemSeqNum + "<span> " + cod_produto + " " + nome + " " + precoFormatado + " x" + qtd + " SUBTOTAL=" + subtotalFormatado+"</span></td></tr>";
  jQuery('#tabelaPapelTermico > tbody').append(linhaProduto);
  rolarPapelTermico();
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
  jQuery('#produtoInputSubtotal').val(subtotalFormatado);
  jQuery('#produtoInput_nome_big').html(obj.nome);
  adicionarLinhaAoCupom(obj);
  jQuery('#qtdItemSearch').val('');
  jQuery('#itemSearch').val('');
  jQuery('#itemSearch').focus();
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

function buscaEPopulaProduto()
{
  var api = "//local.projetostestes/testesc/app/public/api/?api_action=listar_produtos&array=true";
  $.getJSON(api, function (data) {
    datajson = data;

    $.each(datajson, function (i, v) {
      var itemSearchVal = jQuery('#itemSearch').val();
      if (v.cod_produto == itemSearchVal) {
        console.log(itemSearchVal);
          console.log(v);
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
    console.log('alterado');
  });

});