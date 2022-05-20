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
    <link rel="stylesheet" href="../css/login.css">
    <!--STYLES LOCAL-->
    <!-- BootStrap CDN -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Font Awsome CDN-->
</head>
<body>
<header>
<?php
session_start();
?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"> <img src="../IMAGES/iconWallet.png" width="35" alt=""> FINAN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mt-2 mt-md-0">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/RetiradaProgramada.php">REMITADA PROGRAMADA</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link">|</a>
          </li>
          <?php  if (empty($_SESSION['id'])) { ?>
            <li class="nav-item ">
              <a class="nav-link" href="../PAGES/login.php" style="margin-right: 30px">Logar / Registrar</a>
            </li>
          <?php }else{
             $consultaUser=$conexao->query("SELECT * FROM usuarios WHERE id = '$_SESSION[id]'");
             $exibeUser=$consultaUser->fetch(PDO::FETCH_ASSOC);
            ?>
            <li class="nav-item dropdown" style="margin-right: 100px">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá <?= $exibeUser['usuario']; ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown03" style="padding-right: 30px">
              <a class="dropdown-item" href="#">SAIR</a>
            </div>
          </li>
          </div>
          <?php } ?>  
        </ul>
      </div>
    </nav>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <!-- Tabs Titles -->

                            <!-- Icon -->
                            <div class="fadeIn first">
                            <h2><img src="../IMAGES/iconWallet.png" style="width: 40px" id="icon" alt="User Icon" /> FAÇA LOGIN</h2>
                            </div>

                            <!-- Login Form -->
                            <form method="post" action="../SCRIPTS/LOGIN.php">
                            <input type="text" id="login" class="fadeIn second" name="email" placeholder="username">
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                            <input type="submit" class="fadeIn fourth" value="Log In">
                            </form>

                            <!-- Remind Passowrd -->
                            <div id="formFooter">
                            <a class="underlineHover" href="./register.php">Registrar-se</a>
                            </div>

                            </div>
                        </div>
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
<!--BOOTSTRAP JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>