<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css" />
  <title>LIVELIBRAS</title>
  <link rel="shortcut icon" type="imagem/png" href="./img/icone.png" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="login.php" method="POST" class="sign-in-form">
          <h2 class="title">LIVELIBRAS</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name='usuariologin' id='usuariologin' placeholder="Usuario" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name='senhalogin' id='senhalogin' placeholder="Senha" required/>
          </div>
          <input type="submit" value="Login" class="btn solid" />
          <p class="social-text">Ou inscreva-se em plataformas sociais</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form method='POST' class="sign-up-form">
          <h2 class="title">LIVELIBRAS</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name='usuariocadastro' id='usuariocadastro' placeholder="Usuario" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name='emailcadastro' id='emailcadastro' placeholder="Email" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name='senhacadastro' id='senhacadastro' placeholder="Senha" required/>
          </div>
          <button type="button" onclick="cadastrar()" class="btn btn-second">Criar Conta</button>
          <p class="social-text">Ou inscreva-se em plataformas sociais</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Seja Bem-Vindo!</h3>
          <p>
            Crie sua conta e comece sua jornada conosco
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Cadastre-se
          </button>
        </div>
        <img src="img/icone.png" class="image center-img" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Criou sua conta?</h3>
          <p>
            entre e venha fazer parte da familia LIVELIBRAS
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Login
          </button>
        </div>
        <img src="img/icone.png" class="image center-img" alt="" />
      </div>
    </div>
  </div>

  <script src="./js/app.js"></script>
</body>

</html>

<script>
  function cadastrar() {
    var email = document.getElementById('emailcadastro').value;
    var usuario = document.getElementById('usuariocadastro').value;
    var senha = document.getElementById('senhacadastro').value;
    if (!email || !usuario || !senha) {
      alert('Email, usuario ou senha invalido')

    } else {

      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'salvar.php',
        data: {
          emailcadastro: email,
          usuariocadastro: usuario,
          senhacadastro: senha

        },
        success: function(result) {
          alert('Usuário cadastrado com sucesso')
        },
        error: function(result) {
          alert('Email ou usuario já cadastrado')
        }


      });


    }
  }
</script>

<?php
  if ($_SESSION['nao_autenticado'] == true){ ?>
  <script>
    window.onload = function() {
      alert ('Usuario ou senha incorreta')
      location.reload();

};
  </script>
 <?php
  $_SESSION['nao_autenticado'] = false;
  
  }
  ?>

