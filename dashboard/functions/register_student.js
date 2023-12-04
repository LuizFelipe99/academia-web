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

  if (active.checked) {
    active = 1;
  } else {
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
      showAlertSuccess();
    },
    complete: function (response) {
      document.getElementById("c-loader").style.display = 'none';
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