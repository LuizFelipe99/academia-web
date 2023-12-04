<?php
session_start();
$user = $_SESSION['username'];
if (!$user){
  session_destroy();
  header('location: ../index.php');
  die();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />
    <style>
      body{
        font-size: 18px;
      }
    </style>
  </head>
  <body>

  <div class="alert alert-danger" role="alert" id="alert" >
    Ocorreu erro ao salvar!
    <p><b>*Verifique os campos obrigatórios!*</b></p>
    <div class="progress-bar">
        <div class="progress "></div>
    </div>
  </div>
  <div class="alert alert-success" role="alert" id="alert-success" >
    Sucesso!
    <p><b>*Cadastro realizado com sucesso!*</b></p>
    <div class="progress-bar">
        <div class="progress-ok"></div>
    </div>
  </div>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
	        <?php
            include('menu.php');
          ?>

	      </div>
    	</nav>
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
      <?php
          include('nav_interno.php');
        ?>
        <h2 class="mb-4">Novo Usuário</h2>
        <form>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Usuário</label>
                <input type="text" class="form-control" id="user"  placeholder="Usuário">
                <small class="form-text text-muted">Campo referente ao login do usuário na plataforma.</small>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" id="password" placeholder="Senha">
                <small class="form-text text-muted">Campo referente a senha do usuário na plataforma.</small>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail">
          </div>
          <div class="row">
          <div class="form-group col-sm-6">
            <label>Endereço</label>
            <input type="text" class="form-control" id="adress" placeholder="Endereço completo">
          </div>
          <div class="form-group col-sm-6">
            <label>Telefone</label>
            <input type="text" class="form-control" id="phone" placeholder="Telefone">
          </div>
          <!-- <label>Avatar</label> -->
            <div class="card container mb-5" style="width: 10rem;">
              <img class="card-img-top" src="../images/avatar-female01.png" alt="Card image cap">
              <div class="card-body">
                <input type="radio" value="avatar-female01.png" name="avatar" id="avatar" class="container" checked>
              </div>
            </div>
            <div class="card container mb-5" style="width: 10rem;">
              <img class="card-img-top" src="../images/avatar-female02.png" alt="Card image cap">
              <div class="card-body">
                <input type="radio" value="avatar-female02.png" name="avatar" id="avatar" class="container" >
              </div>
            </div>
            <div class="card container mb-5" style="width: 10rem;">
              <img class="card-img-top" src="../images/avatar-female03.png" alt="Card image cap">
              <div class="card-body">
                <input type="radio" value="avatar-female03.png" name="avatar" id="avatar" class="container" >
              </div>
            </div>
            <div class="card container mb-5" style="width: 10rem;">
              <img class="card-img-top" src="../images/avatar-male02.png" alt="Card image cap">
              <div class="card-body">
                <input type="radio" value="avatar-male02.png" name="avatar" id="avatar" class="container" >
              </div>
            </div>
            <div class="card container mb-5" style="width: 10rem;">
              <img class="card-img-top" src="../images/avatar-male03.png" alt="Card image cap">
              <div class="card-body">
                <input type="radio" value="avatar-male03.png" name="avatar" id="avatar" class="container" >
              </div>
            </div>
            <div class="card container mb-5" style="width: 10rem;">
              <img class="card-img-top" src="../images/avatar-male04.png" alt="Card image cap">
              <div class="card-body">
                <input type="radio" value="avatar-male04.png" name="avatar" id="avatar" class="container" >
              </div>
            </div>
            <div class="form-group col-sm-5" >
            <label for="exampleFormControlSelect1">Grupo</label>
              <select class="form-control" id="user_group">
                <option value="1" >ADMINSTRADOR</option>
                <option value="2" >ALUNO</option>
                <option value="3" >PERSONAL</option>
              </select>
            </div>
            <div class="form-group col-sm-2">
              <label>Ativo</label>
              <br>
              <label class="switch ">
                <input type="checkbox" id="active" checked>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <button type="button" onclick="create_user()" class="btn btn-primary">Salvar</button>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        </form>
      
        <!-- aqui coloco o que quiser -->
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="functions/register_user.js"></script>
  
  </body>
</html>
