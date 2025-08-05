<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>B&G Soluções</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="img/logo.png" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
	    <h2 class="login-title">B&G Soluções</h2>
            <form method="post" action="controle-acesso/controleAcesso.php">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control rounded" placeholder="email@email.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Senha</label>
                <input type="password" name="senha" id="password" class="form-control rounded" placeholder="digite sua senha">
              </div>
              <button name="login" id="login" class="btn btn-block login-btn rounded" type="submit">Login</button>
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block img-login">
         <!-- <img src="img/login.jpg" class="login-img"> -->
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/vendor/bootstrap-notify.min.js" style="opacity: 1;"></script>
  <script>
  $("#email").focus();
  $("#email, #password").keypress(function(event){
        $(".close").click();
  });  
  $("#login").on("click", function(event) {
	let email = $("#email").val();
  	let password = $("#password").val();
	if (!email || !password) {
          event.preventDefault();
          $.notify({
            // options
            message: 'Preencha usuário e senha'
          },{
            // settings
            type: 'danger'
          });
          console.log("No Form" + email + " and " + password);
        }
  });



		var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
		};
		
		if(getUrlParameter('falha')){
			switch(getUrlParameter('falha')){
				case 'true':
          $.notify({
            // options
            message: 'Usuário ou Senha <strong>incorreto!</strong>'
          },{
            // settings
            type: 'danger'
          });
				break;
			}
		}
	</script>
</body>
</html>
