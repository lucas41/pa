<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link href="./css/css-index/aos/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style-login.css">

  <!-- Template Main CSS File -->
  <link href="./css/css-index/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Arsha - v4.7.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
<body>
<?php
    session_start();
    if(isset($_SESSION['msg_sucess']) && !empty($_SESSION['msg_sucess'])){
      $status = $_SESSION['msg_sucess'];
    }
    if(isset($_SESSION['msg_error']) && !empty($_SESSION['msg_error'])){
        $status = $_SESSION['msg_error'];
    }
    session_destroy();
    ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">LOS CHICAGOS</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="./user/_insertchamado.php">Abrir chamado</a></li>
          <li><a class="nav-link scrollto" href="#">Ver todos os chamados</a></li>
          <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#cadastro">Cadastrar</a>
          </li>
          <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  
  <!-- MOdal section -->

  <!-- Modal de login -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Faça login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="wrapper">
            <div id="formContent">
              <!-- Login Form -->
              <form action="login/login.php" method="post"><br>
                <input type="email" name="usuario" class="fadeIn" placeholder="email" required>
                <input type="password" name="senha" class="fadeIn" placeholder="senha" required> <br><br>
                <input type="submit" class="fadeIn" value="Entrar">
              </form>
              <!-- Remind Passowrd -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim do modal de login -->

  <!-- Modal de cadastro -->

  <div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="cadastro" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Faça seu cadastro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="wrapper">
            <div id="formContent">
              <form action="cadastro/_insert_usuario.php" method="post"><br>
                <input type="text" name="nomeusuario" class="fadeIn" placeholder="Nome" required autocomplete="off">
                <input type="email" name="mailusuario" class="fadeIn" placeholder="Email" required autocomplete="off">
                <input type="number" name="telefone" class="fadeIn" placeholder="Telefone" required autocomplete="off">
                <input type="number" name="cpf" class="fadeIn" placeholder="CPF" required autocomplete="off">
                <input type="password" name="senhausuario" class="fadeIn" placeholder="senha" required autocomplete="off" >
                <input type="password" name="Repetir Senha" class="fadeIn" placeholder="Confirme a senha" required
                  oninput="validaSenha(this)" autocomplete="off">
                <br><br>
                <input type="submit" class="fadeIn" value="Cadastrar ">
                <script>
                  function validaSenha(input) {
                      if (input.value != document.getElementById(' ').value) {
                          input.setCustomValidity('Repita a senha corretamente');
                      } else {
                          input.setCustomValidity('');
                      }
                  }
              </script>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fim do modal de cadastro-->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Gestão de incidentes urbanos</h1>
          <h2>Sistema focado na abertura de chamados sobre problemas encontrados nos bairros</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#" class="btn-get-started scrollto">ABRIR CHAMADO</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="./public/images/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>COMO ABRIR UM CHAMADO</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>

            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit
              </li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>

            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        <p><?php echo $status ?></p>
      </div>
    </div>
  </footer><!-- End Footer -->
    



  <!-- Vendor JS Files -->
  <script src="./js/js-index/aos/aos.js"></script>
  <script src="./js/js-index/glightbox/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./js/js-index/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
    crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="./js/js-index/main.js"></script>
  


</body>

</html>