<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./IMAGES/iconWallet.png" type="image/png">
    <title>FINAN - Seu Controle Financeiro</title>
    <!--STYLES LOCAL-->
    <link rel="stylesheet" href="./css/index.css">
    <!--STYLES LOCAL-->
    <!-- BootStrap CDN -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Font Awsome CDN-->
</head>
<body>
<?php
 session_start();
 if (empty($_SESSION['id'])){
  //header('location: ./PAGES/login.php');
}
 include "./COMPONENTS/conexao.php";
 $consultaValor=$conexao->query("SELECT valor FROM ValorAtual WHERE id_user = '$_SESSION[id]' ORDER BY id DESC");
 $exibValor=$consultaValor->fetch(PDO::FETCH_ASSOC);
 $valorAtual = $exibValor['valor'];

 $consultaValorDataProg=$conexao->query("SELECT * FROM ValorRetProg WHERE ativo = 1 AND id_user = '$_SESSION[id]'");

 while ($exibValorDataProg=$consultaValorDataProg->fetch(PDO::FETCH_ASSOC)){
  $idDataReg = $exibValorDataProg['id'];
  $data = date('Y-m-d');
  $exibValorDataProg['data'];
  $modo = "RETIRADA PROGRAMADA!";
  $vlr =  $valorAtual - $exibValorDataProg['valor'];
  $valorRetirado = $exibValorDataProg['valor'];
  $obcervacao = $exibValorDataProg['obcervacao'];

  if ($data == $exibValorDataProg['data']){
    $inserir=$conexao->query("INSERT INTO ValorAtual (valor) VALUES ('$vlr') WHERE id_user = '$_SESSION[id]'");
    $inserirMod=$conexao->query("INSERT INTO ValorMod (valor, modo, data, obcervacao, status) VALUES ('$valorRetirado', '$modo', '$data', '$obcervacao', '1') WHERE id_user = '$_SESSION[id]'");

    $update=$conexao->query("UPDATE ValorRetProg SET ativo = 0 WHERE id = $idDataReg WHERE id_user = '$_SESSION[id]'");
  }
 } 

?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"> <img src="./IMAGES/iconWallet.png" width="35" alt=""> FINAN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mt-2 mt-md-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./pages/RetiradaProgramada.php">REMITADA PROGRAMADA</a>
          </li>
          <li class="nav-item active barra">
            <a class="nav-link">|</a>
          </li>
          <?php  if (empty($_SESSION['id'])) { ?>
            <li class="nav-item ">
              <a class="nav-link" href="./PAGES/login.php" style="margin-right: 30px">Logar / Registrar</a>
            </li>
          <?php }else{
             $consultaUser=$conexao->query("SELECT * FROM usuarios WHERE id = '$_SESSION[id]'");
             $exibeUser=$consultaUser->fetch(PDO::FETCH_ASSOC);
            ?>
            <li class="nav-item dropdown" style="margin-right: 100px">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá <?= $exibeUser['usuario']; ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown03" style="padding-right: 30px">
              <a class="dropdown-item" href="./COMPONENTS/logoff.php">SAIR</a>
            </div>
          </li>
          </div>
          <?php } ?>  
        </ul>
      </div>
    </nav>
</header>
<main>
    <div class="container container-preco">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="d-flex justify-content-center h1-preco"> <span style="font-size: 30px; margin-top: 30px; margin-right: 10px;">R$</span><?= number_format($exibValor['valor'],2,",",".") ?></h1>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <button class="btn-adicionar" data-toggle="modal" data-target="#ExemploModalCentralizado">ADICIONAR</button>
            </div>
            <div class="col-sm-4">
              <button class="btn-remover" data-toggle="modal" data-target="#ExemploModalRemover">RETIRAR</button>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="historico"><!--HISTORICO-->
      <div class="container">
        <div class="row">
          <?php
             $consultaValorMod=$conexao->query("SELECT * FROM ValorMod WHERE id_user = $_SESSION[id] ORDER BY id DESC LIMIT 6");
             while ($exibValorMod=$consultaValorMod->fetch(PDO::FETCH_ASSOC)){
          ?>
              <div class="col-sm-1"></div>
              <div class="col-sm-1" style="margin-top: 7px;"><?php if ($exibValorMod['status'] == 0) { ?><img src="./IMAGES/iconADD.png" width="70" alt=""> <?php } else { ?><img src="./IMAGES/iconRemover.png" width="70" alt=""><?php } ?></div>
              <div class="col-sm-4" style="margin-top: 12px;"><h4 class="modoValor"><?= $exibValorMod['modo'] ?></h4><h4 class="obcervacaoValor" ><?= $exibValorMod['obcervacao'] ?></h4></div>
              <div class="col-sm-3" style="margin-top: 12px;"><h4><?= date('d/m/Y', strtotime($exibValorMod['data'])) ?></h4></div>
              <div class="col-sm-3" style="margin-top: 12px;"><h4 class="precoValor"><?php if ($exibValorMod['status'] == 1) { ?> - <?php } ?>R$ <?= number_format($exibValorMod['valor'],2,",","."); ?></h4></div>

         <?php } ?>

        </div>
      </div>
    </div>
</main>
<footer class="py-4 bg-dark flex-shrink-0 fixed-bottom">
    <div class="container text-center">
      <a href="https://bootstrapious.com/snippets" class="text-muted">TODOS OS DIREITOS RESERVADOS A JOSE ANTONIO GUIMARÃES NETO</a>
    </div>
</footer>
<!-- Modal Adicionar -->
<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerAdicionar">
        <h5 class="modal-title" id="TituloModalCentralizado">ADICIONAR VALORES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span style="color: white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="SCRIPTS/addValor.php" method="post" class="d-block justify-content-center">
          <label for="" class="d-flex">VALOR</label>
          <input type="numeric" name="valorAdd" style="width: 70%" />
          <label for="" class="d-flex">Obcervação</label>
          <input type="text" name="Obcervacao" style="width: 70%;" />
          <button class="btnAdd" type="submit" placeholder="R$ 0,00">ADICIONAR</button>
        </form> 
      </div>
     <!-- <div class="modal-footer footerAdicionar">
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal Remover -->
<div class="modal fade" id="ExemploModalRemover" tabindex="-1" role="dialog" aria-labelledby="ExemploModalRemover" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRemover">
        <h5 class="modal-title" id="ExemploModalRemover">SUBTRAIR VALORES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="SCRIPTS/removerValor.php" method="post" class="d-block justify-content-center">
          <label for="" class="d-flex">VALOR</label>
          <input type="numeric" name="valorAdd" class="" style="width: 70%" />
          <label for="" class="d-flex">Obcervação</label>
          <input type="text" name="Obcervacao" style="width: 70%;" />
          <button class="btnRemove" placeholder="R$ 0,00">REMOVER</button>
        </form> 
      </div>
      <!--<div class="modal-footer footerRemover">
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>-->
    </div>
  </div>
</div>
<!--BOOTSTRAP JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>