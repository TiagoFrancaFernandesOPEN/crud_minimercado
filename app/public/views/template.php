<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Teste</title>

  <link href="css/min.css" rel="stylesheet" type="text/css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css">

  <script type="text/javascript" src="http://livejs.com/live.js"></script>
</head>

<body>
  <nav class="nav" tabindex="-1" onclick="this.focus()">
    <div class="container">
      <a class="pagename current" href="#">MiniMercado </a>
      <a href="#">Estoque</a>
      <a href="#">Tributos</a>
      <a href="#">PDV</a>
    </div>
  </nav>
  <button class="btn-close btn btn-sm">×</button>
  <div class="container_produtos">
    <div class="hero cl_plan">
      <h1>Example</h1>
      <p>You can view the source of this page and copy it to get a quick start on a project with Min!</p>
      <p>You can view the source of this page and copy it to get a quick start on a project with Min!</p>
      <a class="btn btn-b" href="#link">Go places!</a>
    </div>
    <div class="row">
      <div class="col c2 produto pink">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-a">Do stuff!</a>
      </div>
      <div class="col c2 produto grey">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-b">Do stuff!</a>
      </div>
      <div class="col c2 produto green">
        <h3>Yay headings!</h3>You can view the source of this page and copy it to get a quick start on a project with
        Min!<br><a href="#link" class="btn btn-sm btn-c">Do stuff!</a>
      </div>
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
              <a href="#link" class="btn btn-sm btn-a f-rigth">Editar</a>
              <a href="#link" class="btn btn-sm btn-b f-rigth">Abrir</a>
              <a href="#link" class="btn btn-sm btn-c f-rigth">Excluir</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>