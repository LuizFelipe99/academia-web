window.onLoad = listarAgendas();
window.onLoad = listarInstructor();

function listarAgendas() {
  let tipo = "list";
  let limit = "nao";
  let name_student = document.getElementById("name_student").value;
  let status = document.getElementById("status").value;
  let id_instructor = document.getElementById("instructor_id").value;
  let content = '';

  jQuery.ajax({
    url: window.location.origin + "/back-end-academia/schedule.php",
    type:"POST",
    dataType: "json",
    timeout: 5000,
    data: {
      name_student: name_student,
      status: status,
      id_instructor: id_instructor,
      limit: limit,
      tipo: tipo,
    },
    beforeSend: function () {
      document.getElementById("c-loader").style.display = 'block';
    },
    success: function (response) {
      dados = response.dados;
      if (response.dados.length > 0) {
        result_query =
          "<p>Resultado: " + response.total + " agendas</p>";

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
            "<td><b style='width: 60%;'  class='badge badge-pill "+style+"' >"+response.dados[i].status+"</td>"+
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
        instructor +=
          "<option value='0'>Todos</option>";
        for (i = 0; i < response.dados.length; i++) {
          instructor +=
            "<option value='" + response.dados[i].id + "'>" + response.dados[i].name + "</option>";
        }
        document.getElementById("instructor_id").innerHTML = instructor;
      }
    },
    complete: function (response) {
    },
    error: function (response) {
      alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
    }
  });
}
