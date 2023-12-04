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
      <!-- informações de usuarios -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" id="">Total de usuarios</h5>
                <div id="countUsersResult">

                </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuarios Ativos</h5>
              <div id="countUsersActiveResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuários Inativos</h5>
              <div id="countUsersInactiveResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <!-- informações de instrutor -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total instrutor</h5>
              <div id="countInstructorResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Istrutor Ativos</h5>
              <div id="countInstructorActiveResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Istrutor Inativos</h5>
              <div  id="countInstructorInactiveResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <!-- informações de alunos -->
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total aluno</h5>
              <div id="countStudentResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aluno Ativos</h5>
              <div id="countStudentActiveResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aluno Inativos</h5>
              <div id="countStudentInactiveResult">

              </div>
              <a href="#" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
      </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>

    function chamaTodas(){
      countUsers();
      countUsersActive();
      countUsersInactive();
  
      countInstructor();
      countInstructorActive();
      countInstructorInactive();
  
      countStudent();
      countStudentActive();
      countStudentInactive();
    }
    window.onLoad = chamaTodas();

    function countUsers() {
      let tipo = "countUsers";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_user.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countUsersResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    function countUsersActive() {
      let tipo = "countUsersActive";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_user.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countUsersActiveResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    function countUsersInactive() {
      let tipo = "countUsersInactive";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_user.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countUsersInactiveResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    // area do instrutor começa aqui
    function countInstructor() {
      let tipo = "countInstructor";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_instructor.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countInstructorResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    function countInstructorActive() {
      let tipo = "countInstructorActive";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_instructor.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countInstructorActiveResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    function countInstructorInactive() {
      let tipo = "countInstructorInactive";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_instructor.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countInstructorInactiveResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }
    // aqui cmeça informações dos alunos
    function countStudent() {
      let tipo = "countStudent";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_student.php",
        type: "POST",
        dataType: "json",
        timeout: 10000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countStudentResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    function countStudentActive() {
      let tipo = "countStudentActive";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_student.php",
        type: "POST",
        dataType: "json",
        timeout: 10000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countStudentActiveResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }
    function countStudentInactive() {
      let tipo = "countStudentInactive";
      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_student.php",
        type: "POST",
        dataType: "json",
        timeout: 10000,
        data: {
          tipo: tipo,
        },
        beforeSend: function () {
        },
        success: function (response) {
          let instructor = '';
          dados = response.dados;
          if (response.dados) {
            for (i = 0; i < response.dados.length; i++) {
              instructor +=
                "<p class='card-text'>"+response.dados[i].total+"</p>";
            }
            document.getElementById("countStudentInactiveResult").innerHTML = instructor;
          }
        },
        complete: function (response) {
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }


</script>
</body>

</html>