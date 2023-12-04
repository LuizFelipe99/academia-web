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

<div class="alert alert-danger" role="alert" id="alert-empty" >

    Ocorreu erro ao salvar!

    <p><b>*Preencha todos os campos.*</b></p>

    <div class="progress-bar">

        <div class="progress "></div>

    </div>

  </div>

<div class="alert alert-danger" role="alert" id="alert" >

    Ocorreu erro ao salvar!

    <p><b>*Data,horario e instrutor nao disponiveis.*</b></p>

    <div class="progress-bar">

        <div class="progress "></div>

    </div>

  </div>

  <div class="alert alert-success" role="alert" id="alert-success" >

    Sucesso!

    <p><b>*Avaliação agendada com sucesso!*</b></p>

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

  <!-- agenda -->

  <form>

  <div class="row">

        <div class="col-sm-4">

          <div class="card">

            <div class="card-body">

              <h5 class="card-title" id="">Agenda de horario</h5>

              <div class="row">

                <div class="col">

                  <div class="form-group">

                    <label>Aluno</label>

                    <input type="text" class="form-control" id="student" list="id_student" placeholder="Aluno">

                    <datalist id="id_student">

                    <!-- vai ser preenchido com dados do banco -->

                    </datalist>

                  </div>

                  <div class="form-group">

                    <label>Data</label>

                    <input type="date" class="form-control" id="date">

                  </div>

                </div>

                <div class="col">

                  <div class="form-group ">

                    <label for="exampleFormControlSelect1">Instrutor</label>

                    <select class="form-control" id="instructor_id">

                    </select>

                  </div>

                  <div class="form-group">

                    <label>Hora</label>

                    <input type="time" class="form-control" id="time">

                  </div>

                </div>

              </div>

              <a href="#" onclick="insert()" class="btn btn-primary">Agendar</a>

            </div>

          </div>

        </div>



        <div class="col-sm-8">

          <div class="card">

            <div class="card-body">

              <h5 class="card-title">Ultimas 10 agendas</h5>

              <div style="overflow-x:auto;">

                <table class="table table-hover">

                  <thead>

                    <tr>

                      <th scope="col">Aluno</th>

                      <th scope="col">Avaliador</th>

                      <th scope="col">Data</th>

                      <th scope="col">Hora</th>

                      <th scope="col">Status</th>

                    </tr>

                  </thead>

                  <tbody id="result">

                  </tbody>

                </table>

              </div>

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

    

</body>



<script>

  window.onload =listarInstructor();

  window.onload =listarStudent();



  function listarInstructor() {

    let tipo = "list";

    jQuery.ajax({

      url: window.location.origin + "/back-end-academia/api_instructor.php",

      type: "POST",

      dataType: "json",

      timeout: 5000,

      data: {

        tipo: tipo

      },

      beforeSend: function () {

    

      },

      success: function (response) {

        let instructor = '';

        dados = response.dados;

        if (response.dados) {

          for (i = 0; i < response.dados.length; i++) {

            instructor +=

              "<option value='" + response.dados[i].id + "'>" + response.dados[i].name + "</option>";

          }

          document.getElementById("instructor_id").innerHTML = instructor;

          // document.getElementById("instructor_id_edit").innerHTML = instructor;

        }

            },

            complete: function (response) {

            },

            error: function (response) {

              alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);

            }

    });

  }



  // listar aluno

  function listarStudent() {

    let tipo = "list";

    let active = 1;

    jQuery.ajax({

      url: window.location.origin + "/back-end-academia/api_student.php",

      type: "POST",

      dataType: "json",

      timeout: 5000,

      data: {

        tipo: tipo,

        active: active

      },

      beforeSend: function () {


      },
      success: function (response) {
        let student = '';
        dados = response.dados;
        if (response.dados) {
          for (i = 0; i < response.dados.length; i++) {
            student +=
              "<option value='" + response.dados[i].id + "' >"+ response.dados[i].name +" </option>";
          }
          document.getElementById("id_student").innerHTML = student;
        }
            },

            complete: function (response) {
            },
            error: function (response) {
              alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
            }
    });
  }

  // funç/ao que faz o agendamento
  // listar aluno

  function insert() {
    let tipo = "insert";
    let id_instructor = document.getElementById("instructor_id").value;
    let id_student = document.getElementById("student").value;
    let date = document.getElementById("date").value;
    let time = document.getElementById("time").value;


    if (id_instructor == '' || id_student == ''|| date == '' || time == '' ){
      showAlertErrorEmpty();
      return;
    }else{
    jQuery.ajax({
      url: window.location.origin + "/back-end-academia/schedule.php",
      type: "POST",
      dataType: "json",
      timeout: 5000,
      data: {
        id_instructor: id_instructor,
        id_student: id_student,
        date: date,
        time: time,
        tipo: tipo
      },
      beforeSend: function () {
      },
      success: function (response) {
        status = response.status;
        if (status == "true") {
          showAlertSuccess();
          get10();
        }else{
          showAlertError();
        }
      },
      complete: function (response) {
      },
      error: function (response) {
        alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
      }
    });
  } // fechando if
  }
  // listar ultimas 10 agenads
  window.onload = get10();
  function get10() {
    let tipo = "list";
    let content = '';
    let limit = "sim";
    jQuery.ajax({
      url: window.location.origin + "/back-end-academia/schedule.php",
      type: "POST",
      dataType: "json",
      timeout: 5000,
      data: {
        limit: limit,
        tipo: tipo,
      },
      beforeSend: function () {
      },
      success: function (response) {
        let style = '';
        dados = response.dados;
        if (response.dados.length > 0) {
          for (i = 0; i < response.dados.length; i++) {
            let status = response.dados[i].status;
            switch (status) {
              case 'CANCELADO':
                style = 'badge-danger';
                break;
              case 'PENDENTE':
                style = 'badge-warning';
                break;
              case 'CONCLUÍDO':
                style = 'badge-success';
                break;
              default:
                style = '';
            }
            content +=
              "<tr>"+
                "<td>"+response.dados[i].name+"</td>"+
                "<td>"+response.dados[i].instructor+"</td>"+
                "<td>"+response.dados[i].date+"</td>"+
                "<td>"+response.dados[i].time+"</td>"+
                "<td><b style='width: 100%;'  class='badge badge-pill "+style+"' >"+response.dados[i].status+"</td>"+
              "</tr>";

          }

          document.getElementById("result").innerHTML = content;

        }

      },

      complete: function (response) {

      },

      error: function (response) {

        alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);

      }

    });

  }



  // função para exibir os alerts

  function showAlertError() {

    var alertBox = document.getElementById('alert');

    alertBox.style.display = 'block';



    var progressBar = alertBox.querySelector('.progress');



    setTimeout(function () {

      alertBox.style.display = 'none';

    }, 5000); // 5 segundos

  }



  function showAlertSuccess() {

    var alertBox = document.getElementById('alert-success');

    alertBox.style.display = 'block';



    var progressBar = alertBox.querySelector('.progress');



    setTimeout(function () {

      alertBox.style.display = 'none';

    }, 5000); // 5 segundos

  }

  function showAlertErrorEmpty() {

    var alertBox = document.getElementById('alert-empty');

    alertBox.style.display = 'block';



    var progressBar = alertBox.querySelector('.progress');



    setTimeout(function () {

      alertBox.style.display = 'none';

    }, 5000); // 5 segundos

  }





  // função para pegar data atual pra frente

  // Obtém a referência para o elemento input

  var input = document.getElementById('date');



  // Obtém a data atual

  var dataAtual = new Date();



  // Converte a data atual para o formato adequado para o atributo 'min' do input date

  var ano = dataAtual.getFullYear();

  var mes = ('0' + (dataAtual.getMonth() + 1)).slice(-2); // Acrescenta um zero à esquerda se necessário

  var dia = ('0' + dataAtual.getDate()).slice(-2); // Acrescenta um zero à esquerda se necessário

  var dataFormatada = ano + '-' + mes + '-' + dia;



  // Define o valor mínimo para o input

  input.min = dataFormatada;









</script>



</html>