<?php
  session_start();
  $avatar = $_SESSION['avatar'];
  $user = $_SESSION['username'];
  $id_instructor = $_SESSION['id_instructor'];
  if (!$user){
    session_destroy();
    header('location: ../index.php');
    die();
  }

  // Verifica se a sessão existe e se já expirou
  if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
      // Se a sessão expirou, destrói a sessão
      session_unset();
      session_destroy();
      // Redireciona para a página de login ou outra página desejada
      header("Location: ../index.php");
      exit();
  }

  // Atualiza o último horário de atividade da sessão
  $_SESSION['last_activity'] = time();
  
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="styles.css">
<link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />


<title>GYM 1.0</title>
<a href="index.php" class="img logo rounded-circle mb-3" style="background-image: url('../images/<?php echo $avatar; ?>');"></a>  
<center><?php echo $user;?><br><br>
<span class="badge badge-danger"><a href="../../back-end-academia/logout.php">Sair</a></span></center>

<ul class="list-unstyled components mb-5">
  <li class="">
    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle fa fa-home fa-lg"> Inicio</a>
    <ul class="collapse list-unstyled" id="homeSubmenu">
      <li>
        <a href="news.php">Novidades</a>
      </li>
      <li>
        <a href="about.php">Sobre</a>
      </li>
      <li>
        <a href="contact.php">Contato</a>
      </li>
    </ul>
  </li>
  <li class="">
    <a href="#cadastrosSubmenu" data-toggle="collapse"  aria-expanded="false" class="dropdown-toggle fa fa-id-card-o fa-lg"> Cadastros</a>
    <ul class="collapse list-unstyled" id="cadastrosSubmenu">
      <li>
        <a href="register_user.php">Usuário</a>
      </li>
      <li>
        <a href="register_student.php">Aluno</a>
      </li>
      <li>
        <a href="register_instructor.php">Instrutor</a>
      </li>
    </ul>
  </li>
  <li>
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle fa fa-bar-chart fa-lg"> Relatório</a>
    <ul class="collapse list-unstyled" id="pageSubmenu">
      <li>
          <a href="rel_user.php">Relatório Usuário</a>
      </li>
      <li>
          <a href="rel_student.php">Relatório Aluno</a>
      </li>
      <li>
          <a href="rel_instructor.php">Relatório Instrutor</a>
      </li>
      <li>
        <a href="datasheet.php"> Fichas</a>
      </li>
    </ul>
  </li>
  <li>
    <a class="fa fa-users fa-lg" href="instructor_aluno.php"> Instrutor / Aluno</a>
  </li>
  <hr>
  <li>
    <a class="fa fa-calendar-plus-o fa-lg" href="schedule.php"> Agendar avaliação</a>
  </li>
  <li>
    <a class="fa fa-calendar fa-lg" href="rel_schedule.php"> Agendas</a>
  </li>
  <li>
    <a class="fa fa-pencil-square-o fa-lg" href="assess.php"> Avaliações</a>
  </li>
  <li>
    <a class="fa fa-pencil-square-o fa-lg" href="register_datasheet.php"> Nova Ficha</a>
  </li>

  
</ul>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>