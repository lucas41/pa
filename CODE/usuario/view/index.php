<?php

session_start();

include '../../usuario/view/css.php';
include '../../templates/user/template-header.php';

?>

<link rel="stylesheet" href="/CODE/css/style-login.css">

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

            <form action="/CODE/usuario/model/login.php" method="post"><br>
              <input type="email" name="usuario" placeholder="email" required>
              <input type="password" name="senha" placeholder="senha" required> <br><br>
              <input type="submit" value="Entrar">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
            <form action="/CODE/usuario/model/cadastro.php" method="post"><br>
              <input type="text" name="nomeusuario" placeholder="Nome" required autocomplete="off">
              <input type="email" name="mailusuario" placeholder="Email" required autocomplete="off">
              <input type="number" name="telefone" placeholder="Telefone" required autocomplete="off" maxlength="9">
              <input type="number" name="cpf" placeholder="CPF" required autocomplete="off" maxlength="11" >
              <input type="password" name="senhausuario" placeholder="senha" required autocomplete="off">
              <input type="password" name="Repetir Senha" placeholder="Confirme a senha" required oninput="validaSenha(this)" autocomplete="off">
              <br><br>
              <input type="submit" value="Cadastrar ">
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

<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Gestão de incidentes urbanos</h1>
        <h2 style='text-align:left'>Sistema focado na abertura de chamados sobre problemas encontrados nos bairros</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="#" class="btn-get-started scrollto">ABRIR UM CHAMADO</a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="/CODE/public/images/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section>

<main id="main">
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>SOBRE NÓS</h2>
        <iframe autoplay muted width="100%" height="50%" src="https://www.youtube.com/embed/W31skBmLneE?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

    </div>
  </section>
</main>

<footer id="footer">

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      <a href="/CODE/usuario/view/index.php" class="logo text-center"><img src="/CODE/public/images/logo.png" height="9%" id="side-main-logo"></a>
    </div>
  </div>
  
</footer>

<?php include '../../templates/user/template-js.php'; ?>


</html>