<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gpan Sistemas - Atualizar Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include_once('../imports/css-head.php');
    ?>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner">
    <?php
    include_once('../imports/navbar.php');
    include_once('../imports/sidebar.php');
    ?>

    <main>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-12">

                    <h1>Atualizar Cadastro</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="Dashboard.Home.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Atualizar Cadastro</li>
                        </ol>
                    </nav>
                    <div class="separator mb-5"></div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="../utils/atualizarMeuPefil.php">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nomeEditar" name="nomeEditar" placeholder="Nome" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="emailEditar" name="emailEditar" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telefone">Telefone</label>
                                        <input type="tel" class="form-control" id="telefoneEditar" name="telefoneEditar" maxlength="15" onkeyup="mascara( this, mtel );" value="" placeholder="(__)____-____" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label class="field__label" for="senha">Senha</label>
                                        <input type="password" class="form-control" id="senhaEditar" name="senhaEditar" alt="Sua senha" value="" onchange='check_passEditar();'>
                                    </div>
                                    <div class="col-6">
                                        <label class="field__label" for="inputPassword4">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="inputPasswordConfirmacaoEditar" placeholder="Confirmar Senha" onchange='check_passEditar();'>
                                        <span id='message'></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary d-block mt-3 btn-salvar">Salvar</button>
                                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                                <input type="hidden" id="idStatus" name="idStatus" value="">
                                <input type="hidden" id="perfilEditar" name="perfilEditar" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once('../imports/scripts-footer.php');
    ?>

    <script>
        $('#senha, #inputPasswordConfirmacao').on('keyup', function() {
         if ($('#senha').val() == $('#inputPasswordConfirmacao').val()) {
            $('#message').html('').css('color', 'green');
            $(".btn-salvar").prop('disabled', false);
         } else
            $('#message').html('Senhas são diferentes').css('color', 'red');
            $(".btn-salvar").prop('disabled', true);
      });

        function check_passEditar() {
         if (document.getElementById('senhaEditar').value == document.getElementById('inputPasswordConfirmacaoEditar').value) {
            $(".btn-salvar").prop('disabled', false);
         } else {
            $(".btn-salvar").prop('disabled', true);
         }
      }


        $.ajax({
            url: '../utils/consultarUsuarioPorId.php',
            type: 'POST',
            beforeSend: function() {
                $("#app-container").addClass("show-spinner");
            },
            success: function(data) {
                if (data != false) {
                    var jsonData = JSON.parse(data).data;

                    $("#nomeEditar").val(jsonData.nome);
                    $("#emailEditar").val(jsonData.email);
                    $("#telefoneEditar").val(jsonData.telefone);
                    $("#perfilEditar").val(jsonData.perfil.id_perfil);
                    $("#idUsuario").val(jsonData.id_usuario);
                    $("#idStatus").val(jsonData.status.id_status);
                }
            },
            complete: function(data) {
                $("#app-container").removeClass("show-spinner");
            }
        });




        function mascara(o, f) {
            v_obj = o
            v_fun = f
            setTimeout("execmascara()", 1)
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }

        function mtel(v) {
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }

        /*Função que padroniza CEP*/
        function Cep(v) {
            v = v.replace(/D/g, "")
            v = v.replace(/^(\d{5})(\d)/, "$1-$2")
            return v
        }

        function validacaoEmail(field) {
            usuario = field.value.substring(0, field.value.indexOf("@"));
            dominio = field.value.substring(field.value.indexOf("@") + 1, field.value.length);

            if ((usuario.length >= 1) &&
                (dominio.length >= 3) &&
                (usuario.search("@") == -1) &&
                (dominio.search("@") == -1) &&
                (usuario.search(" ") == -1) &&
                (dominio.search(" ") == -1) &&
                (dominio.search(".") != -1) &&
                (dominio.indexOf(".") >= 1) &&
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
                document.getElementById("msgemail").innerHTML = "E-mail válido";
                document.getElementById('submit').readonly = false;
            } else {
                document.getElementById("msgemail").innerHTML = "<font color='red'>E-mail inválido </font>";
                document.getElementById('submit').readonly = true;
            }
        }
    </script>

</body>

</html>