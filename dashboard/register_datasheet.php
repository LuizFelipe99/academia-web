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
      <h2 class="mb-4">Nova ficha de treino</h2>
      <b>Ficha: {{ADICIONAR NUMERO DA FICHA AQUI}}</b>
      <center> <div id="c-loader"></div> </center>
      <form>
        <div class="row">
          <div class="col-sm-8">
            <div class="form-group">
              <label>Aluno</label>
              <input type="text" class="form-control" id="name" placeholder="Nome Completo do Aluno">
            </div>
          </div>
          <div class="form-group col-sm-2">
            <label>Ativo</label>
            <br>
            <label class="switch ">
              <input type="checkbox" id="active" checked>
              <span class="slider round"></span>
            </label>
          </div>


          <div class="col-sm-3">
            <div class="form-group">
              <label>Exercicio</label>
              <input type="text" class="form-control" id="name" placeholder="Voador">
            </div>
          </div>
          <div class="col-sm-1">
            <div class="form-group">
              <label>Repetição</label>
              <input type="text" class="form-control" id="name" placeholder="10x">
            </div>
          </div>
          <div class="col-sm-1">
            <div class="form-group">
              <label>Série</label>
              <input type="text" class="form-control" id="name" placeholder="5">
            </div>
          </div>
          <div class="col-sm-1">
            <div class="form-group">
              <label>Peso</label>
              <input type="text" class="form-control" id="name" placeholder="10Kg">
            </div>
          </div>
          <div class="col-sm-1">
            <div class="form-group">
              <label>Descanso</label>
              <input type="text" class="form-control" id="name" placeholder="1 min">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Equipamento</label>
              <input type="text" class="form-control" id="name" placeholder="Voador">
            </div>
          </div>
        </div>
        <button type="button" onclick="create_student()" class="btn btn-primary">Adicionar</button>
        <h4>Prévia</h4>
        <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Exercicio</th>
            <th scope="col">Repetição</th>
            <th scope="col">Série</th>
            <th scope="col">Peso</th>
            <th scope="col">Descanso</th>
            <th scope="col">Equipamento</th>
          </tr>
        </thead>
        <tbody id="result">
        </tbody>
      </table>
      </form>
      
      <!-- aqui coloco o que quiser -->
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- <script src="functions/register_student.js"></script> -->

  
</body>

</html>