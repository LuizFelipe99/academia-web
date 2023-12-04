<?php
session_start();
$user = $_SESSION['username'];
$id_instructor = $_SESSION['id_instructor'];
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
  <link rel="stylesheet" href="styles.css">
  <link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />

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
      <!-- campo para utilizar o id de quem está logado -->
      <input type="text" id="id_instructor" hidden value="<?php echo $id_instructor; ?>"> 
      <!-- informações de usuarios -->
      <form>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Buscar aluno</h5>
              <input type="text" class="form-control" id="user" placeholder="Nome do aluno"><br>
              <a href="#" class="btn btn-primary" onclick="listarUsuarios()">Buscar</a>
              <a href="#" class="btn btn-primary" onclick="assingStudent()">Atribuir selecionado</a> <br> <br>
              <center>
                <div id="c-loader1"></div>
              </center>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">-</th>
                    <th scope="col">Aluno</th>
                  </tr>
                </thead>
                <tbody id="result">
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Meus alunos</h5>
              <a href="#" class="btn btn-primary" onclick="removeStudent()">Remover selcionado</a> <br><br>
              <center>
                <div id="c-loader2"></div>
              </center>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">-</th>
                    <th scope="col">Aluno</th>
                  </tr>
                </thead>
                <tbody id="result2">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</form>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="functions/instructor_aluno.js"></script>

</body>



</html>