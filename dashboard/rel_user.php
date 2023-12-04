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
      <h2 class="mb-4">RELATORIO DE USUARIOS</h2>
      <form>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Usuário</label>
              <input type="text" class="form-control" id="user"  placeholder="Usuário">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="email" placeholder="E-mail">
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
          <div class="form-group col-sm-3" >
            <label for="exampleFormControlSelect1">Grupo</label>
            <select class="form-control" id="user_group">
              <option value="0" >TODOS</option>
              <option value="1" >ADMINSTRADOR</option>
              <option value="2" >ALUNO</option>
              <option value="3" >PERSONAL</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <button type="button" onclick="listarUsuarios()" class="btn btn-primary">Aplicar Filtros</button>
        </div>
        <center> <div id="c-loader"></div> </center>
        <p id="result_query"></p>
        <div style="overflow-x:auto;">
          <table class="table table-striped" >
            <thead>
              <tr>
                <th scope="col">*</th>
                <th scope="col">Usuario</th>
                <th scope="col">E-mail</th>
                <th scope="col">Criado</th>
                <th scope="col">Grupo</th>
                <th scope="col">Ativo</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="result">
            </tbody>
          </table>
        </div>
      </form>
    </div>
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
            <button type="button" onclick="updateUser()" class="btn btn-primary">Salvar alterações</button>
          </div>
        </div>
      </div>
    </div>
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="functions/rel_user.js"></script>
  </body>


  
  
</html>