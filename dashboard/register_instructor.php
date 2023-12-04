<?php
  session_start();
  $user = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />
    <style>
      
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
        <h2 class="mb-4">Registrar Instrutor</h2>
        <form>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="exampleFormControlSelect1">Instrutor</label>
            <select class="form-control" id="instructor_name">
            </select>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Descrição</label>
              <input type="text" class="form-control" id="description" placeholder="Personal Trainer, Fisioterapeuta..">
            </div>
          </div>
          <div class="form-group col-sm-4">
            <label>Ocupação</label>
            <input type="text" class="form-control" id="occupation" placeholder="Educador Físico">
          </div>
          <div class="form-group col-sm-6">
            <label for="exampleFormControlSelect1">Ativo</label>
            <select class="form-control" id="active">
              <option value="1">ATIVO</option>
              <option value="0">INATIVO</option>
            </select>
          </div>
          <!-- </div> -->
        </div>
        <button type="button" onclick="creatInstructor()" class="btn btn-primary">Salvar</button>
        
      </form>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="functions/register_instructor.js"></script>
   
  </body>
</html>