<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
 include "./COMPONENTS/conexao.php";
 $consultaValor=$conexao->query("SELECT valor FROM ValorAtual ORDER BY id DESC");
 $exibValor=$consultaValor->fetch(PDO::FETCH_ASSOC);
?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">FINAN</a>
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
            <a class="nav-link" href="#">REMITADA PROGRAMADA</a>
          </li>
        </ul>
      </div>
    </nav>
</header>
<main>
    <div class="container container-preco">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="d-flex justify-content-center h1-preco"> <span style="font-size: 30px; margin-top: 30px; margin-right: 10px;">R$</span><?= $exibValor['valor']; ?></h1>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <button class="btn-adicionar" data-toggle="modal" data-target="#ExemploModalCentralizado">TESTE</button>
            </div>
            <div class="col-sm-4">
              <button class="btn-remover" data-toggle="modal" data-target="#ExemploModalRemover" >TESTE</button>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="historico"><!--HISTORICO-->
      <div class="container">
        <div class="row">
          <?php
             $consultaValorMod=$conexao->query("SELECT * FROM ValorMod ORDER BY id DESC");
             while ($exibValorMod=$consultaValorMod->fetch(PDO::FETCH_ASSOC)){
          ?>
              <div class="col-sm-1"></div>
              <div class="col-sm-1" style="margin-top: 7px;"><?php if ($exibValorMod['status'] == 0) { ?><img src="./IMAGES/iconADD.png" width="70" alt=""> <?php } else { ?><img src="./IMAGES/iconRemover.png" width="70" alt=""><?php } ?></div>
              <div class="col-sm-4" style="margin-top: 7px;"><h4 class="modoValor"><?= $exibValorMod['modo'] ?></h4><h4 class="obcervacaoValor"><?= $exibValorMod['obcervacao'] ?></h4></div>
              <div class="col-sm-3" style="margin-top: 7px;"><h4><?= date('d/m/Y', strtotime($exibValorMod['data'])) ?></h4></div>
              <div class="col-sm-2" style="margin-top: 7px;"><h4 class="precoValor">R$ <?= number_format($exibValorMod['valor'],2,",","."); ?></h4></div>
              <div class="col-sm-1" style="margin-top: 7px;"></div>

         <?php } ?>

        </div>
      </div>
    </div>
</main>
<footer class="py-4 bg-dark flex-shrink-0 fixed-bottom">
    <div class="container text-center">
      <a href="https://bootstrapious.com/snippets" class="text-muted">Bootstrap snippet by Bootstrapious</a>
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