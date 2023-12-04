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
      <h2 class="mb-4">New Student</h2>
      <center> <div id="c-loader"></div> </center>
      <form>
        <div class="row">
          <div class="col-sm-8">
            <div class="form-group">
              <label>Nome completo</label>
              <input type="text" class="form-control" id="name" placeholder="Nome Completo do Aluno">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Data de nascimento</label>
              <input type="date" class="form-control" id="age">
            </div>
          </div>
          <div class="form-group col-sm-3">
            <label>E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail">
          </div>
          <div class="form-group col-sm-3">
            <label>Usuário</label>
            <input type="text" class="form-control" id="user" placeholder="Usuário">
          </div>
           <div class="form-group col-sm-3">
            <label>Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Senha">
          </div>
          <!-- </div> -->
          <!-- <div class="row"> -->
          <div class="form-group col-sm-2">
            <label>Telefone</label>
            <input type="text" class="form-control" id="phone" placeholder="(33) 9 9999-3333">
          </div>
          <div class="form-group col-sm-4">
            <label>Endereço</label>
            <input type="text" class="form-control" id="adress" placeholder="Endereço  completo">
          </div>
          <div class="form-group col-sm-3">
            <label for="exampleFormControlSelect1">Nível</label>
            <select class="form-control" id="level">
              <option value="1">INICIANTE</option>
              <option value="2">MEDIANO</option>
              <option value="3">AVANÇADO</option>
            </select>
          </div>
          <div class="form-group col-sm-2">
            <label for="exampleFormControlSelect1">Instrutor</label>
            <select class="form-control" id="instructor_id">
              <option value="1" > - </option>
            </select>
          </div>
          
          <div class="form-group col-sm-2">
            <label>Contrato</label>
            <select class="form-control" id="contract_id">
              <option value="1">MENSAL</option>
              <option value="2">TRIMESTRAL</option>
              <option value="3">SEMESTRAL</option>
              <option value="4">ANUAL</option>
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
        <button type="button" onclick="create_student()" class="btn btn-primary">Salvar</button>
      </form>

      <!-- aqui coloco o que quiser -->
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="functions/register_student.js"></script>

  
</body>

</html>