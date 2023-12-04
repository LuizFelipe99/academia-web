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
  <link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
  </head>

<body>
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
      <h2 class="mb-4">Fichas dos alunos</h2>
      <form>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>Aluno</label>
            <input type="text" class="form-control" id="name_student" placeholder="Nome do aluno">
          </div>
        </div>
        <div class="form-group col-sm-3">
          <label for="exampleFormControlSelect1">Instrutor</label>
          <select class="form-control" id="instructor_id">
          </select>
        </div>
      </div>
      <div class="form-group">
        <button type="button" onclick="listarFichas()" class="btn btn-primary">Aplicar Filtros</button>
      </div>
      <center>
        <div id="c-loader"></div>
      </center>
      <p id="result_query"></p>
      <div style="overflow-x:auto;">
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Aluno</th>
            <th scope="col">Instrutor</th>
            <th scope="col">Ficha</th>
          </tr>
        </thead>
        <tbody id="result">
        </tbody>
      </table>
      <!-- aqui coloco o que quiser -->
    </div>
    </label>
  </div>
  </div>
  </form>
</div>




  


  
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="functions/datasheet.js"></script>



</body>

</html>