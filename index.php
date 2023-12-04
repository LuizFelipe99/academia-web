<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/index-login.css">
   <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <title>GYM 1.0</title>
  <link rel="shortcut icon" href="images/logo_app.png" type="image/x-icon" />
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
      <center><img src="images/FOCUS.svg" alt=""></center>
			<div class="card-header">
				<h3>FOCUS</h3>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="user" name="user"placeholder="Usuário">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password" placeholder="Senha">
					</div>
					<div class="form-group">
						<input type="button" style="width: 100%;" value="Entrar" onClick="login()" class="btn float-right login_btn">
					</div>
				</form>
			</div>
      <center> <div id="c-loader"></div> </center>
      <div class='alert alert-danger' id="msg-login" role='alert' style='text-align: center;' >
        Credenciais invalidas / Usuário bloqueado
      </div>
			<!-- <div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
  <script>
    function login(){
      let user = document.getElementById("user").value;
      let password = document.getElementById("password").value;
      let tipo = "login";

      jQuery.ajax({
                url: window.location.origin + "/back-end-academia/api_user.php",
                type: "POST",
                dataType: "json",
                timeout: 5000,
                data: {
                    user: user,
                    password: password,
                    tipo: tipo
                },
                beforeSend: function(){  
                  document.getElementById("c-loader").style.display = 'block';   
                  document.getElementById("msg-login").style.display = 'none';     
                },         
                success: function(response){
                  dados = response.dados;
                  if (response.dados) {
                    window.location.href = window.location.origin + "/academia/dashboard/news.php";
                  }else{
                    document.getElementById("msg-login").style.display = 'block';  
                  }
                },
                complete: function(response){
                  document.getElementById("c-loader").style.display = 'none';
                },
                error: function(response){
                    alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
                }
            });
    }

    // function listarUsuarios(){
    //   let user = document.getElementById("user").value;
    //   let password = document.getElementById("password").value;
    //   let tipo = "list";
    //   let content = '';
    //   jQuery.ajax({
    //             url: window.location.origin + "/back-end-academia/api_student.php",
    //             type: "POST",
    //             dataType: "json",
    //             timeout: 5000,
    //             data: {
    //               user: user,
    //               password: password,
    //               tipo: tipo
    //             },
    //             beforeSend: function(){    
    //               document.getElementById("c-loader").style.display = 'block';        
    //             },         
    //             success: function(response){
    //               dados = response.dados;
    //               if (response.dados) {
    //                 for ( i=0; i<response.dados.length; i++ ) {
    //                   content +=
    //                   "<tr><td>"+response.dados[i].name+"</td>" +
    //                   "<td>"+response.dados[i].email+"</td></tr>";
    //                 };
    //                 document.getElementById("result").innerHTML = content;
    //               }else{
    //                 alert('nada listado');
    //               }
    //             },
    //             complete: function(response){
    //               document.getElementById("c-loader").style.display = 'none';  
    //             },
    //             error: function(response){
    //                 alert("Falha ao processar, por favor tente novamente. \n Cod: "+response.status+"\n Resposta: "+response.responseText);
    //             }
    //         });
    // }
  </script>
  
</body>
</html>