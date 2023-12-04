function create_user() {
  let user = document.getElementById("user").value;
  let password = document.getElementById("password").value;
  let email = document.getElementById("email").value;
  let avatar = document.querySelector('input[name="avatar"]:checked').value;
  let user_group = document.getElementById("user_group").value;
  let active = document.getElementById("active");
  let adress = document.getElementById("adress").value;
  let phone = document.getElementById("phone").value;
  let tipo = "insert";


  if (active.checked) {
    active = 1;
  } else {
    active = 0;
  }

  if (user == "" || password == "" || email == "" || avatar == "" || user_group == "" || adress == "" || phone == "") {
    showAlertError();
    return;
  }

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/api_user.php",
    type: "POST",
    dataType: "json",
    timeout: 5000,
    data: {
      tipo: tipo,
      user: user,
      password: password,
      email: email,
      avatar: avatar,
      user_group: user_group,
      active: active,
      adress: adress,
      phone: phone

    },
    beforeSend: function () {
      console.log(active);
    },
    success: function (response) {
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