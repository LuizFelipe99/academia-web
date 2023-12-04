window.onLoad = listForGroup();

function listForGroup() {
  let tipo = "listForGroup";
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
        instructor +=
          "<option value='0'>SELECIONE</option>";
        for (i = 0; i < response.dados.length; i++) {
          instructor +=
            "<option value='" + response.dados[i].id + "'>" + response.dados[i].username + "</option>";
        }
        document.getElementById("instructor_name").innerHTML = instructor;
      }
    },
    complete: function (response) {
    },
    error: function (response) {
      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
    }
  });
}

function creatInstructor() {
  let tipo = "insert";
  var select = document.getElementById("instructor_name");
  var name = select.options[select.selectedIndex].text;

  let id_user = document.getElementById("instructor_name").value;
  let description = document.getElementById("description").value;
  let occupation = document.getElementById("occupation").value;
  let active = document.getElementById("active").value;


  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_instructor.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      tipo: tipo,
      name: name,
      id_user: id_user,
      description: description,
      occupation: occupation,
      active: active
    },
    beforeSend: function () {
    },
    success: function (response) {
      let instructor = '';
      dados = response.dados;
      if (response.dados) {
        for (i = 0; i < response.dados.length; i++) {
          instructor +=
            "<option value='" + response.dados[i].username + "'>" + response.dados[i].username + "</option>";
        }
        document.getElementById("instructor_name").innerHTML = instructor;
      }
      showAlertSuccess();
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