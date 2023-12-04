<?php
session_start();
$user = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>
    body {
      font-size: 18px;
    }
    #c-loader {
      animation: is-rotating 0.7s infinite;
      border: 4px solid #e5e5e5;
      border-radius: 50%;
      border-top-color: #51d4db;
      height: 30px;
      width: 30px;
      display: none;
      margin-top: 10px;
    }
    @keyframes is-rotating {
      to {
        transform: rotate(1turn);
      }
    }

    input:checked + .slider {
      background-color: #F8B739;
    }



    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #F8B739;
}



input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
      <h2 class="mb-4">New Student</h2>
      <center> <div id="c-loader"></div> </center>
      <form>
        <div class="row">
          <div class="col-sm-8">
            <div class="form-group">
              <label>Nome completo</label>
              <input type="text" class="form-control" id="name" placeholder="Nome Completo do Aluno">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Data de nascimento</label>
              <input type="date" class="form-control" id="age">
            </div>
          </div>
          <div class="form-group col-sm-3">
            <label>E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail">
          </div>
          <div class="form-group col-sm-3">
            <label>Usuário</label>
            <input type="text" class="form-control" id="user" placeholder="Usuário">
          </div>
           <div class="form-group col-sm-3">
            <label>Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Senha">
          </div>
          <!-- </div> -->
          <!-- <div class="row"> -->
          <div class="form-group col-sm-2">
            <label>Telefone</label>
            <input type="text" class="form-control" id="phone" placeholder="(33) 9 9999-3333">
          </div>
          <div class="form-group col-sm-4">
            <label>Endereço</label>
            <input type="text" class="form-control" id="adress" placeholder="Endereço  completo">
          </div>
          <div class="form-group col-sm-3">
            <label for="exampleFormControlSelect1">Nível</label>
            <select class="form-control" id="level">
              <option value="1">INICIANTE</option>
              <option value="2">MEDIANO</option>
              <option value="3">AVANÇADO</option>
            </select>
          </div>
          <div class="form-group col-sm-2">
            <label for="exampleFormControlSelect1">Instrutor</label>
            <select class="form-control" id="instructor_id">
              <option value="1" > - </option>
            </select>
          </div>
          
          <div class="form-group col-sm-2">
            <label>Contrato</label>
            <select class="form-control" id="contract_id">
              <option value="1">MENSAL</option>
              <option value="2">TRIMESTRAL</option>
              <option value="3">SEMESTRAL</option>
              <option value="4">ANUAL</option>
            </select>
          </div>
          
          <div class="form-group col-sm-2">
              <label>Ativo</label>
              <br>
              <label class="switch ">
                <input type="checkbox" id="active" checked>
                <span class="slider round"></span>
              </label>
            </div>
        </div>
        <button type="button" onclick="create_student()" class="btn btn-primary">Salvar</button>
      </form>

      <!-- aqui coloco o que quiser -->
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>
    function create_student() {
      let tipo = "insert";
      let name = document.getElementById("name").value;
      let age = document.getElementById("age").value;
      let email = document.getElementById("email").value;
      let phone = document.getElementById("phone").value;
      let adress = document.getElementById("adress").value;
      let level = document.getElementById("level").value;
      let instructor_id = document.getElementById("instructor_id").value;
      let active = document.getElementById("active");
      let contract_id = document.getElementById("contract_id").value;
      let user = document.getElementById("user").value;
      let password = document.getElementById("password").value;
  
      if( active.checked ){
        active = 1;
      }else{
        active = 0;
      }


      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_student.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
          name: name,
          age: age,
          email: email,
          phone: phone,
          adress: adress,
          level: level,
          instructor_id: instructor_id,
          active: active,
          contract_id: contract_id,
          user: user,
          password: password,
        },
        beforeSend: function () {
          document.getElementById("c-loader").style.display = 'block'; 
        },
        success: function (response) {
        },
        complete: function (response) {
          document.getElementById("c-loader").style.display = 'none'; 
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

  </script>
</body>

</html>