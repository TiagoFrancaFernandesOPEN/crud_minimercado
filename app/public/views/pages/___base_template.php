<?php
$pagina = (isset($pagina))?$pagina:'';
$pageTitle = APP_NAME;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/min.css" rel="stylesheet" type="text/css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css">  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>  
  <!-- //TODO Remover ao final -->
  <script type="text/javascript" src="http://livejs.com/live.js"></script>
  <title><?=$pageTitle ?></title>
</head>

<body>
  <nav class="nav" tabindex="-1" onclick="this.focus()">
    <div class="container">
      <a class="app_name current" href="<?=APP_URL ?>"><?=APP_NAME ?> </a>
      <a href="#">Estoque</a>
      <a href="#">Tributos</a>
      <a href="#">PDV</a>
    </div>
  </nav>
  <button class="btn-close btn btn-sm">×</button>
  <div class="container_produtos">
    <div class="mercado_quadro cl_plan">
      <h1>Example</h1>
      <p>You can view the source of this page and copy it to get a quick start on a project with Min!</p>
      <p>You can view the source of this page and copy it to get a quick start on a project with Min!</p>
      <a class="btn btn-b" href="#link">Go places!</a>
    </div>
    <div class="row">
      <a href="#item" class="col c2 produto pink">
        <h3>ITEM</h3>
      </a>
      <a href="#item" class="col c2 produto grey">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-b">Do stuff!</a>
      </a>
      <a href="#item" class="col c2 produto green">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-c">Do stuff!</a>
      </a>
    </div>
    <div class="row">
      <div class="col c4 pink">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-a">Do stuff!</a>
      </div>
      <div class="col c4 grey">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-b">Do stuff!</a>
      </div>
      <div class="col c4">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-c">Do stuff!</a>
      </div>
    </div>
    <div class="row">
      <table class="table" style=" width: 100%;">
        <tbody>
          <tr>
            <th scope="col">Produto</th>
            <th scope="col">Preço*</th>
            <th scope="col">Imposto</th>
            <th scope="col">Ação</th>
          </tr> 
          <tr>
            <td><strong><a href="#">Produto</a></strong>
            </td>
            <td>R$ 20,00</td>
            <td>10%/Un</td>
            <td>
              <a href="#link" class="btn btn-sm btn-a f-rigth ifModal">Add</a>
              <a href="#link" class="btn btn-sm btn-a f-rigth">Editar</a>
              <a href="#link" class="btn btn-sm btn-b f-rigth">Abrir</a>
              <a href="#link" class="btn btn-sm btn-c f-rigth">Excluir</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col c1 fixed-box">
    <a href="#link" class="btn btn-sm btn-c"><strong>4</strong>Itens</a>
  </div>

</body>
</html>