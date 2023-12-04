<?php
  session_start();
  $user = $_SESSION['username'];
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
        <h2 class="mb-4">NEWS</h2>
        <form>
          <h3> - Cadastros de Usuario funcionando 100% - 01-03-2023</h3>
          <h3> - Relatorio de Usuarios funcionando 100% 08-03-2023</h3>
          <h3> - Cadastro de Alunos funcionando 100% 13-05-2023 </h3>
          <h3> - Relatorio de Alunos funcionando 100% 13-05-2023 </h3>
          <h3> - Cadastro de Instrutor funcionando 100% 13-05-2023 </h3>
          <h3> - Instrutor x Aluno funcionando 100% </h3>
          <h3> - Painel admin funcionando 100% (exibe apenas dados de usuarios) </h3>
          <h3> - Atualizado tela de login </h3>
          <h3> - Atualizado formularios de cadastros ( estilzados ) 30-05-2023 </h3>
          <h3> - Atualizado icones dos menus 30-05-2023 </h3>
          <h3> - Relatorio de instrutor 50% 01-06-2023 </h3>
          <h3> - Relatorio de instrutor editando em construção... 15/06/2023 </h3>
          <h3> - Relatorio de instrutor editando 100%... 15/06/2023 </h3>
          <h3> - Relatorio de instrutor ativando e desativando 100% 15/06/2023 </h3>
          <h3> - Dar inicio a agenda de avaliações 15/06/2023 </h3>
          <h3> - Ajuste feito na API (api_user.php), agora ela verifica o grupo e traz o id_instructor caso pertenca aos grupos admin e personal. </h3>
        </form>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
        <link rel="icon" type="image/png" href="../images/avatar-female01.png"/>
  </body>
</html>