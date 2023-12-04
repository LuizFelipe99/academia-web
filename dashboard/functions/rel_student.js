    function listarStudent() {
      let name = document.getElementById("name").value;
      let email = document.getElementById("email").value;
      let active = document.getElementById("active").value;
      let level = document.getElementById("level").value;
      let instructor_id = document.getElementById("instructor_id").value;
      let tipo = "list";
      let content = '';

      jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_student.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          name: name,
          email: email,
          active: active,
          instructor_id: instructor_id,
          level: level,
          tipo: tipo,
        },
        beforeSend: function () {
          document.getElementById("c-loader").style.display = 'block';
        },
        success: function (response) {
          dados = response.dados;
          result_query =
          "<p>Resultado: "+response.total+" alunos </p>";
          if (response.dados.length > 0) {
            for (i = 0; i < response.dados.length; i++) {
              content +=
                "<tr><td><input type='radio' value='" + response.dados[i].id + "' id='id_student' name='id_student'></td>" +
                // "<td>" + response.dados[i].id + "</td>" +
                "<td>" + response.dados[i].name + "</td>" +
                "<td>" + response.dados[i].email + "</td>" +
                "<td>" + response.dados[i].level + "</td>" +
                "<td>" + response.dados[i].active + "</td>" +
                "<td >" + response.dados[i].instructor + "</td>" +

                "<td><div class='btn-group dropright'>"+
                "<button type='button' class='btn fa fa-plus-square' data-toggle='dropdown' ></button>"+
                "<div class='dropdown-menu'>"+
                "<a class='dropdown-item fa fa fa-pencil fa-fw' onclick='listaUm()' href='#' data-toggle='modal' data-target='#exampleModal'> Editar</a>"+
                "<a class='dropdown-item fa fa-check-square-o'  onclick='activeStudent()' href='#'> Ativar</a>"+
                "<a class='dropdown-item fa fa-minus-square-o'   onclick='deactiveStudent()' href='#'> Desativar</a>"+
                "</div>"+
                "</div></td></tr>";

            };
            document.getElementById("result").innerHTML = content;
            document.getElementById("result_query").innerHTML = result_query;
          } else {
            content +=
              "<td colspan='11' class='msg-empty' >Nenhum resultado encontrado!</td>";
            document.getElementById("result").innerHTML = content;
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
    window.onLoad = listarStudent();
    window.onLoad = listarInstructor();


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

    function listaUm(){
          let id_student = document.querySelector('input[name="id_student"]:checked').value;
          let tipo = "list";
          let contentModal = '';
          // listarInstructor();

          jQuery.ajax({
            url: window.location.origin + "/back-end-academia/api_student.php",
            type: "POST",
            dataType: "json",
            timeout: 5000,
            data: {
              id_student: id_student,
              tipo: tipo,
            },
            beforeSend: function(){    
              document.getElementById("c-loader2").style.display = 'block'; 
            },         
            success: function(response){
              dados = response.dados;
                if (response.dados) {
                  for ( i=0; i<response.dados.length; i++ ) {
                    contentModal +=
                    "<div class='form-row'>"+
                      "<div class='form-group'>"+
                        "<div class='col'>"+
                          "Nome"+
                          "<input type='text' id='name_edit' class='form-control' value='"+response.dados[i].name+"'>"+
                        "</div>"+
                      "</div>"+
                      "<div class='form-group'>"+
                        "<div class='col'>"+
                          "Idade"+
                          "<input type='text' id='age_edit' class='form-control' value='"+response.dados[i].age+"'>"+
                        "</div>"+
                      "</div>"+
                      "<div class='form-group'>"+
                        "<div class='col'>"+
                          "E-mail"+
                          "<input type='text' id='email_edit' class='form-control' value='"+response.dados[i].email+"' >"+
                        "</div>"+
                      "</div>"+
                      "<div class='form-group'>"+
                        "<div class='col'>"+
                          "Telefone"+
                          "<input type='text' id='phone_edit' class='form-control' value='"+response.dados[i].phone+"' >"+
                        "</div>"+
                      "</div>"+
                      "<div class='form-group'>"+
                        "<div class='col'>"+
                          "Endereço"+
                          "<input type='text' id='adress_edit' class='form-control' value='"+response.dados[i].adress+"' >"+
                        "</div>"+
                      "</div>"+
                      "<div class='form-group col-sm-3'>"+
                        "<div class='col'>"+
                          "Level"+
                          "<select class='form-control' id='level_edit'> "+
                            "<option value='"+response.dados[i].id_instructor+"''> >>"+response.dados[i].level+"<< </option>"+
                            "<option value='1' >INICIANTE</option>"+
                            "<option value='2' >MEDIANO</option>"+
                            "<option value='3' >AVANÇADO</option>"+
                          "</select>"+
                        "</div>"+
                      "</div>"+
                      "<div class='form-group col-sm-3'>"+
                        "<div class='col'>"+
                          "Instrutor"+
                          "<select class='form-control' id='instructor_id_edit'> "+
                            "<option value='"+response.dados[i].instructor+"''> >>"+response.dados[i].instructor+"<< </option>"+
                          "</select>"+
                        "</div>"+
                      "</div>"+
                    "</div>";
                    
                  };
                  document.getElementById("resultModal").innerHTML = contentModal;
                  }else{
                    alert('nada listado');
                  }
            },
            complete: function(response){
              document.getElementById("c-loader2").style.display = 'none'; 
            },
            error: function(response){
              alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
            }
          });
        }


function updateStudent() {
  let tipo = "update";
  let id_student = document.querySelector('input[name="id_student"]:checked').value;
  let name_edit = document.getElementById("name_edit").value;
  let age_edit = document.getElementById("age_edit").value;
  let email_edit = document.getElementById("email_edit").value;
  let phone_edit = document.getElementById("phone_edit").value;
  let adress_edit = document.getElementById("adress_edit").value;
  let level_edit = document.getElementById("level_edit").value;

  jQuery.ajax({
        url: window.location.origin + "/back-end-academia/api_student.php",
        type: "POST",
        dataType: "json",
        timeout: 5000,
        data: {
          tipo: tipo,
          id_student: id_student,
          name_edit: name_edit,
          age_edit: age_edit,
          email_edit: email_edit,
          phone_edit: phone_edit,
          adress_edit: adress_edit,
          level_edit: level_edit
        },
        beforeSend: function () {
          document.getElementById("c-loader-update").style.display = 'block'; 
        },
        success: function (response) {
        },
        complete: function (response) {
          document.getElementById("c-loader-update").style.display = 'none'; 
          listarStudent();
        },
        error: function (response) {
          alert("Falha ao processar, por favor tente novamente. \n Cod: " + response.status + "\n Resposta: " + response.responseText);
        }
      });
    }

    function deactiveStudent(){
      let id_student = document.querySelector('input[name="id_student"]:checked').value;
      let active = 0;
      let tipo = "deactivate";
      // let contentModal = '';

          jQuery.ajax({
            url: window.location.origin + "/back-end-academia/api_student.php",
            type: "POST",
            dataType: "json",
            timeout: 5000,
            data: {
              id_student: id_student,
              active: active,
              tipo: tipo,
            },
            beforeSend: function(){   
              document.getElementById("c-loader").style.display = 'block';
            },         
            success: function(response){
            },
            complete: function(response){
              document.getElementById("c-loader").style.display = 'none';
              listarStudent();
            },
            error: function(response){
              alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
            }
          });
        }

        function activeStudent(){
      let id_student = document.querySelector('input[name="id_student"]:checked').value;
      let active = 1;
      let tipo = "deactivate";
      // let contentModal = '';

          jQuery.ajax({
            url: window.location.origin + "/back-end-academia/api_student.php",
            type: "POST",
            dataType: "json",
            timeout: 5000,
            data: {
              id_student: id_student,
              active: active,
              tipo: tipo,
            },
            beforeSend: function(){   
              document.getElementById("c-loader").style.display = 'block';
            },         
            success: function(response){
            },
            complete: function(response){
              document.getElementById("c-loader").style.display = 'none';
              listarStudent();
            },
            error: function(response){
              alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
            }
          });
        }