<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../IMAGES/iconWallet.png" type="image/png">
    <title>FINAN - Seu Controle Financeiro</title>
    <!--STYLES LOCAL-->
    <link rel="stylesheet" href="../css/index.css">
    <!--STYLES LOCAL-->
    <!-- BootStrap CDN -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Font Awsome CDN-->
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"> <img src="../IMAGES/iconWallet.png" width="35" alt=""> FINAN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mt-2 mt-md-0">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">HOME</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="">REMITADA PROGRAMADA</a>
          </li>
        </ul>
      </div>
    </nav>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="  min-height: 100%;  min-height: 100vh; display: flex; align-items: center;">
               <form action="../SCRIPTS/DataProgramada.php" method="post">
                   <label for="" style="width: 100%">Valor</label>
                   <input type="numeric" name="valor" style="width: 100%" />
                   <label for="" style="width: 100%">Obcervacao</label>
                   <input type="text" name="Obcervacao" style="width: 100%">
                   <label for="" style="width: 100%">DATA</label>
                   <input type="date" name="dataProg" name="" id="" style="width: 100%">
                   <button type="submit" class="btnDataProg">CADASTRAR</button>
               </form> 
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</main>
<footer class="py-4 bg-dark flex-shrink-0 fixed-bottom">
    <div class="container text-center">
      <a href="https://bootstrapious.com/snippets" class="text-muted">TODOS OS DIREITOS RESERVADOS A JOSE ANTONIO GUIMARÃES NETO</a>
    </div>
</footer>
</body>
</html>