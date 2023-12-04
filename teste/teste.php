<?php

session_save_path()
?>
<!DOCTYPE html>
<html>
<head>
  <title>GYM - DEV</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://use.fontawesome.com/9637f326b2.js"></script>

</head>
<body>
  <div class="menu-container">
    <nav class="menu">
      <span class="badge badge-danger"><a href="../../back-end-academia/logout.php">Sair</a></span></center>
      <ul>
        <li class="dropdown">
          <a href="#" class="dropdown-btn fa fa-home fa-lg ">Inicio</a>
          <ul class="dropdown-content">
            <li><a href="#">Novidades</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Contato</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-btn fa fa-id-card-o fa-lg"> Cadastros</a>
          <ul class="dropdown-content">
            <li><a href="#">Usuários</a></li>
            <li><a href="#">Alunos</a></li>
            <li><a href="#">Instrutor</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-btn fa fa-bar-chart fa-lg"> Relatórios</a>
          <ul class="dropdown-content">
            <li><a href="#">Relatório Usuário</a></li>
            <li><a href="#">Relatório Aluno</a></li>
            <li><a href="#">Relatório Instrutor</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-btn">Avaliação</a>
          <ul class="dropdown-content">
            <li><a class="fa fa-calendar-plus-o fa-lg"  href="#"> Agendar</a></li>
            <li><a class="fa fa-pencil-square-o fa-lg" href="#"> Avaliações</a></li>
          </ul>
        </li>
        <li>
          <a class="fa fa-users fa-lg"  href="#"> Instrutor / Aluno</a>
        </li>
      </ul>
    </nav>
    <button class="toggle-menu"> Toggle Menu</button>
  </div>

  <script src="script.js"></script>
</body>
</html>
