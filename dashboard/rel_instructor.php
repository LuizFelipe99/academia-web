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
<link rel="shortcut icon" href="../images/logo_app.png" type="image/x-icon" />
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    
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
        <h2 class="mb-4">RELATORIO DE INSTRUTOR</h2>
        <form>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Instrutor</label>
                <input type="text" class="form-control" id="name"  placeholder="Instrutor">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Ocupação</label>
                <input type="text" class="form-control" id="occupation" placeholder="Educador Físico">
              </div>
            </div>
            <div class="form-group col-sm-2">
            <label>Ativo</label>
              <select class="form-control" id="active">
                <option value="5" >TODOS</option>
                <option value="1" >ATIVO</option>
                <option value="0" >INATIVO</option>
              </select>
            </div>
          </div>
            <div class="form-group">
              <button type="button" onclick="listarInstructor()" class="btn btn-primary">Aplicar Filtros</button>
            </div>
          <center> <div id="c-loader"></div> </center>
          <p id="result_query"></p>
          <div style="overflow-x:auto;">
          <table class="table table-striped ">
            <thead>
              <tr>
                <th scope="col">*</th>
                <th scope="col">Nome</th>
                <th scope="col">Ocupação</th>
                <th scope="col">Ativo</th>
                <th scope="col"></th>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="functions/rel_instructor.js"></script>
    
    
    <!-- Modal EDIT ALUNO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <center> <div id="c-loader-update"></div> </center>
          <center> <div id="c-loader2"></div> </center>
            <div id="resultModal">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" onclick="updateInstructor()" class="btn btn-primary">Salvar alterações</button>
      </div>
    </div>
  </div>
</div>

  </body>
</html>