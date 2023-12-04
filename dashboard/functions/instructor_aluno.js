  window.onLoad = listMyStudents(); 

  function listarUsuarios(){
    let user = document.getElementById("user").value;
    let instructor_id = document.getElementById("id_instructor").value;
    let tipo = "listForInstructor";
    let content = '';
    jQuery.ajax({
      url: window.location.origin + "/back-end-academia/api_student.php",
      type: "POST",
      dataType: "json",
      timeout: 5000,
      data: {
        user: user,
        instructor_id: instructor_id,
        tipo: tipo,
      },
      beforeSend: function(){ 
        document.getElementById("c-loader1").style.display = 'block';
      },         
      success: function(response){
        dados = response.dados;
        if (response.dados.length > 0) {
          for ( i=0; i<response.dados.length; i++ ) {
            content +=
              "<tr><td><input type='radio' value='"+response.dados[i].id+"' id='id_student_rel' name='id_student_rel'></td>" +
              "<td>"+response.dados[i].name+"</td>";
          }
          document.getElementById("result").innerHTML = content;
        }else{
          content +=
            "<td colspan='11' class='msg-empty' >Nenhum resultado encontrado!</td>";
          document.getElementById("result").innerHTML = content;
          }
      },
      complete: function(response){
        document.getElementById("c-loader1").style.display = 'none';
      },
      error: function(response){
        alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
      }
    });
  }

  function assingStudent(){
    let id_student = document.querySelector('input[name="id_student_rel"]:checked').value;
    let instructor_id = document.getElementById("id_instructor").value;
    let tipo = "assingStudent";
    let content = '';

    jQuery.ajax({
      url: window.location.origin + "/back-end-academia/api_student.php",
      type: "POST",
      dataType: "json",
      timeout: 5000,
      data: {
        id_student: id_student,
        instructor_id: instructor_id,
        tipo: tipo,
      },
      beforeSend: function(){ 
        document.getElementById("c-loader1").style.display = 'block';
      },         
      success: function(response){
      },
      complete: function(response){
        document.getElementById("c-loader1").style.display = 'none';
        listarUsuarios();
        listMyStudents();
      },
      error: function(response){
        alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
      }
    });
  }

  function removeStudent(){
    let id_student = document.querySelector('input[name="id_student_remove"]:checked').value;
    let tipo = "removeStudent";
    let content = '';

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
        console.log(id_student);
        console.log(tipo);
      },         
      success: function(response){
      },
      complete: function(response){
        document.getElementById("c-loader2").style.display = 'none';
        listarUsuarios();
        listMyStudents();
      },
      error: function(response){
        alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
      }
    });
  }


   function listMyStudents(){
    let id_instructor = document.getElementById("id_instructor").value;
    let tipo = "mystudent";
    let content = '';
    jQuery.ajax({
      url: window.location.origin + "/back-end-academia/api_instructor.php",
      type: "POST",
      dataType: "json",
      timeout: 5000,
      data: {
        id_instructor: id_instructor,
        tipo: tipo,
      },
      beforeSend: function(){ 
        document.getElementById("c-loader2").style.display = 'block';
      },         
      success: function(response){
        dados = response.dados;
        let style = '';
        let status;
        if (response.dados.length > 0) {
          for ( i=0; i<response.dados.length; i++ ) {
            if (response.dados[i].active == '1'){
              style = 'badge-success';
              status = 'ATIVO';
            }else{
                style = 'badge-danger';
                status = 'INATIVO';
              }
            
            content +=
              "<tr><td><input type='radio' value='"+response.dados[i].id+"' id='id_student_remove' name='id_student_remove'></td>" +
              "<td>"+response.dados[i].name+"</td>"+
              "<td><span class='badge badge-pill "+style+"'>"+status +"</span></td>";
          }
          document.getElementById("result2").innerHTML = content;
        }else{
          content +=
            "<td colspan='11' class='msg-empty' >Nenhum resultado encontrado!</td>";
          document.getElementById("result2").innerHTML = content;
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


