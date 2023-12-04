window.onLoad = listarUsuarios();
function listarUsuarios() {
  let user = document.getElementById("user").value;
  let email = document.getElementById("email").value;
  let active = document.getElementById("active").value;
  let user_group = document.getElementById("user_group").value;
  let tipo = "list";
  let content = '';

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_user.php",
    type:"POST",
    dataType: "json",
    timeout: 5000,
    data: {
      user: user,
      email: email,
      active: active,
      user_group: user_group,
      tipo: tipo,
    },
    beforeSend: function () {
      document.getElementById("c-loader").style.display = 'block';
    },
    success: function (response) {
      dados = response.dados;
      if (response.dados.length > 0) {
        result_query =
          "<p>Resultado: " + response.total + " usuarios</p>";

        for (i = 0; i < response.dados.length; i++) {
          let active = response.dados[i].active;
          switch (active) {
            case 'ATIVO':
              style = 'badge-success';
              break;
            case 'INATIVO':
              style = 'badge-warning';
              break;
            default:
              style = '';
          }

          content +=

            "<tr><td><input type='radio' value='" + response.dados[i].id + "' id='id_user' name='id_user'></td>" +
              "<td>" + response.dados[i].username + "</td>" +
              "<td>" + response.dados[i].email + "</td>" +
              "<td>" + response.dados[i].register + "</td>" +
              "<td>" + response.dados[i].group + "</td>" +
              "<td> <b style='width: 100%; padding: 5%;' class='badge badge-pill " + style + "'>" + response.dados[i].active + "</td>" +

              "<td><div class='btn-group dropright'>" +
              "<button type='button' class='btn fa fa-plus-square' data-toggle='dropdown' ></button>" +
              "<div class='dropdown-menu'>" +
              "<a class='dropdown-item fa fa fa-pencil fa-fw' onclick='listaUm()'  href='#' data-toggle='modal' data-target='#exampleModal'> Editar</a>" +
              "<a class='dropdown-item fa fa-check-square-o'  onclick='activeUser()' href='#'> Ativar</a>" +
              "<a class='dropdown-item fa fa-minus-square-o'   onclick='deactiveUser()' href='#'> Desativar</a>" +
              "</div>" +
              "</div></td>"+
            "</tr>";

        };
        document.getElementById("result").innerHTML = content;
        document.getElementById("result_query").innerHTML = result_query;
      } else {
        content +=
          "<td colspan='11' class='msg-empty' >Nenhum resultado encontrado!</td>";
        document.getElementById("result").innerHTML = content;
        document.getElementById("result_query").innerHTML = result_query;
      }
    },
    complete: function (response) {
      document.getElementById("c-loader").style.display = 'none';
    },
    error: function (response) {
      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
    }
  });
}



function listaUm() {

  let id_user = document.querySelector('input[name="id_user"]:checked').value;

  let tipo = "list";

  let contentModal = '';



  jQuery.ajax({

    url: window.location.origin + "/back-end-academia/api_user.php",

    type: "POST",

    dataType: "json",

    timeout: 5000,

    data: {

      id_user: id_user,

      tipo: tipo,

    },

    beforeSend: function () {

      document.getElementById("c-loader2").style.display = 'block';

    },

    success: function (response) {

      dados = response.dados;

      if (response.dados) {

        for (i = 0; i < response.dados.length; i++) {

          contentModal +=

            "<div class='form-row'>" +

            "<div class='form-group'>" +

            "<div class='col'>" +

            "Usuario" +

            "<input type='text' id='usuario' class='form-control' value='" + response.dados[i].username + "'>" +

            "</div>" +

            "</div>" +

            "<div class='form-group'>" +

            "<div class='col'>" +

            "E-mail" +

            "<input type='text' id='email_user' class='form-control' value='" + response.dados[i].email + "'>" +

            "</div>" +

            "</div>" +

            "<div class='form-group'>" +

            "<div class='col'>" +

            "Data de cadastro" +

            "<input type='text' id='register' class='form-control' value='" + response.dados[i].register + "' readonly >" +

            "</div>" +

            "</div>" +

            "<div class='form-group col-sm-3'>" +

            "<div class='col'>" +

            "Grupo" +

            "<select class='form-control' id='grupo'> " +

            "<option value='" + response.dados[i].user_group + "''> >>" + response.dados[i].group + "<< </option>" +

            "<option value='1' >ADMINSTRADOR</option>" +

            "<option value='2' >ALUNO</option>" +

            "<option value='3' >PERSONAL</option>" +

            "</select>" +

            "</div>" +

            "</div>" +

            "<div class='form-group'>" +

            "<div class='col'>" +

            "Endereço" +

            "<input type='text' id='adress' class='form-control' value='" + response.dados[i].adress + "'>" +

            "</div>" +

            "</div>" +

            "<div class='form-group'>" +

            "<div class='col'>" +

            "Telefone" +

            "<input type='text' id='phone' class='form-control' value='" + response.dados[i].phone + "'>" +

            "</div>" +

            "</div>" +

            "</div>";

        };

        document.getElementById("resultModal").innerHTML = contentModal;

      } else {

        alert('nada listado');

      }

    },

    complete: function (response) {

      document.getElementById("c-loader2").style.display = 'none';

    },

    error: function (response) {

      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);

    }

  });

}

function updateUser() {

  let user_id = document.querySelector('input[name="id_user"]:checked').value;

  let user = document.getElementById("usuario").value;

  let email = document.getElementById("email_user").value;

  let user_group = document.getElementById("grupo").value;

  let adress = document.getElementById("adress").value;

  let phone = document.getElementById("phone").value;

  // let password = "123"; bv

  let tipo = "update";

  let contentModal = '';



  jQuery.ajax({

    url: window.location.origin + "/back-end-academia/api_user.php",

    type: "POST",

    dataType: "json",

    timeout: 5000,

    data: {

      user_id: user_id,

      user: user,

      email: email,

      user_group: user_group,

      adress: adress,

      phone: phone,

      tipo: tipo,

    },

    beforeSend: function () {

      document.getElementById("c-loader-update").style.display = 'block';

    },

    success: function (response) {

      listarUsuarios();

    },

    complete: function (response) {

      document.getElementById("c-loader-update").style.display = 'none';

    },

    error: function (response) {

      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);

    }

  });

}



function deactiveUser() {

  let user_id = document.querySelector('input[name="id_user"]:checked').value;

  let active = 0;

  let tipo = "deactivate";

  let contentModal = '';



  jQuery.ajax({

    url: window.location.origin + "/back-end-academia/api_user.php",

    type: "POST",

    dataType: "json",

    timeout: 5000,

    data: {

      user_id: user_id,

      active: active,

      tipo: tipo,

    },

    beforeSend: function () {

      // console.log(active); 

      document.getElementById("c-loader").style.display = 'block';

    },

    success: function (response) {

      listarUsuarios();

    },

    complete: function (response) {

    },

    error: function (response) {

      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);

    }

  });

}

function activeUser() {

  var user_id = document.querySelector('input[name="id_user"]:checked').value;

  let active = 1;

  let tipo = "deactivate";

  let contentModal = '';



  jQuery.ajax({

    url: window.location.origin + "/back-end-academia/api_user.php",

    type: "POST",

    dataType: "json",

    timeout: 5000,

    data: {

      user_id: user_id,

      active: active,

      tipo: tipo,

    },

    beforeSend: function () {

      // console.log(active); 

      document.getElementById("c-loader").style.display = 'block';

    },

    success: function (response) {

      listarUsuarios();



    },

    complete: function (response) {

      // document.getElementById("c-loader").style.display = 'none'; 

    },

    error: function (response) {

      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);

    }

  });

}