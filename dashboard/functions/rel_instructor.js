function listarInstructor() {
  let name = document.getElementById("name").value;
  let occupation = document.getElementById("occupation").value;
  let active = document.getElementById("active").value;
  let tipo = "list";
  let content = '';
  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_instructor.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      name: name,
      occupation: occupation,
      active: active,
      tipo: tipo,
    },
    beforeSend: function () {
      document.getElementById("c-loader").style.display = 'block';
    },
    success: function (response) {
      dados = response.dados;
      if (response.dados.length > 0) {
        result_query =
          "<p>Resultado: " + response.total + " instrutores</p>";
        for (i = 0; i < response.dados.length; i++) {
          content +=
            "<tr><td><input type='radio' value='" + response.dados[i].id + "' id='id_instructor' name='id_instructor'></td>" +
            "<td>" + response.dados[i].name + "</td>" +
            "<td>" + response.dados[i].occupation + "</td>" +
            "<td >" + response.dados[i].active + "</td>" +

            "<td><div class='btn-group dropright'>" +
            "<button type='button' class='btn fa fa-plus-square' data-toggle='dropdown' ></button>" +
            "<div class='dropdown-menu'>" +
            "<a class='dropdown-item fa fa fa-pencil fa-fw' onclick='listaUm()' href='#' data-toggle='modal' data-target='#exampleModal'> Editar</a>" +
            "<a class='dropdown-item fa fa-check-square-o'  onclick='activeInstructor()' href='#'> Ativar</a>" +
            "<a class='dropdown-item fa fa-minus-square-o'  onclick='deactiveInstructor()' href='#'> Desativar</a>" +
            "</div>" +
            "</div></td></tr>";

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
window.onLoad = listarInstructor();// quando carrega a tela pela primeira vez executa a função

function listaUm() {
  let id_instructor = document.querySelector('input[name="id_instructor"]:checked').value;
  let tipo = "list";
  let contentModal = '';

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_instructor.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      id_instructor: id_instructor,
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
            "Instrutor" +
            "<input type='text' id='name' class='form-control' value='" + response.dados[i].name + "'>" +
            "</div>" +
            "</div>" +
            "<div class='form-group'>" +
            "<div class='col'>" +
            "Ocupação" +
            "<input type='text' id='occupation_edit' class='form-control' value='" + response.dados[i].occupation + "'>" +
            "</div>" +
            "</div>" +
            "<div class='form-group'>" +
            "<div class='col'>" +
            "Descrição" +
            "<input type='text' id='description_edit' class='form-control' value='" + response.dados[i].description + "'>" +
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
function updateInstructor() {
  let id_instructor_edit = document.querySelector('input[name="id_instructor"]:checked').value;
  let description_edit = document.getElementById("description_edit").value;
  let occupation_edit = document.getElementById("occupation_edit").value;

  let tipo = "update";

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_instructor.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      id_instructor_edit: id_instructor_edit,
      description_edit: description_edit,
      occupation_edit: occupation_edit,
      tipo: tipo,
    },
    beforeSend: function () {
      document.getElementById("c-loader-update").style.display = 'block';
    },
    success: function (response) {
      listarInstructor();
    },
    complete: function (response) {
      document.getElementById("c-loader-update").style.display = 'none';
    },
    error: function (response) {
      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
    }
  });
}

function deactiveInstructor() {
  let id_instructor = document.querySelector('input[name="id_instructor"]:checked').value;
  let active = 0;
  let tipo = "deactivate";

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_instructor.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      id_instructor: id_instructor,
      active: active,
      tipo: tipo,
    },
    beforeSend: function () {
      document.getElementById("c-loader").style.display = 'block';
    },
    success: function (response) {
      listarInstructor();
    },
    complete: function (response) {
    },
    error: function (response) {
      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
    }
  });
}
function activeInstructor() {
  let id_instructor = document.querySelector('input[name="id_instructor"]:checked').value;
  let active = 1;
  let tipo = "deactivate";

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_instructor.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      id_instructor: id_instructor,
      active: active,
      tipo: tipo,
    },
    beforeSend: function () {
      document.getElementById("c-loader").style.display = 'block';
    },
    success: function (response) {
      listarInstructor();
    },
    complete: function (response) {
    },
    error: function (response) {
      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
    }
  });
}
