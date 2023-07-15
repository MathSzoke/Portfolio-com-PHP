<?php
session_start();
include 'db.php';
$dataAgora = date("Y-m-d H:i:s", strtotime("-3 hours"));
$queryUpdate = mysqli_query($conexao, "UPDATE EsqueciSenha SET Expirado = 1, Acao = 'Expirado' WHERE HoraExpira < '$dataAgora'");

if($_COOKIE["theme"] == "dark") 
{
    $class = "dark";
} 
else if($_COOKIE["theme"] == 'light')
{
    $class = "body";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginLayout.css">
    <link rel="stylesheet" href="css/notify.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="css/style-switcher-login.css">
    <link rel="stylesheet" href="css/skinsLogin/color-1-login.css">
    <link rel="stylesheet" href="css/skinsLogin/color-1-login.css" class="alternate-style" title="color-1-login" disabled>
    <link rel="stylesheet" href="css/skinsLogin/color-2-login.css" class="alternate-style" title="color-2-login" disabled>
    <link rel="stylesheet" href="css/skinsLogin/color-3-login.css" class="alternate-style" title="color-3-login" disabled>
    <link rel="stylesheet" href="css/skinsLogin/color-4-login.css" class="alternate-style" title="color-4-login" disabled>
    <link rel="stylesheet" href="css/skinsLogin/color-5-login.css" class="alternate-style" title="color-5-login" disabled>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <script src="js/notify.min.js"></script> -->
    <script src="js/notify.js"></script>
</head>
<body class="<?php echo $class ?>">
    <div class="logo">
        <a><span>M</span>ath</a>
    </div>
    <div id="notification-area"></div>
    <div id="main" class="main active-sx">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="register.php" method="POST">
                <label id="lblRegistrar" for="chk" aria-hidden="true">Registrar</label>
                <input minlength="1" maxlength="70" id="txtApelido" type="text" name="apelidoRegister" placeholder="Nome" required autocomplete='off' value="">
                <span id="availability"></span>
                <input minlength="1" maxlength="80" id="txtEmailRegister" type="email" name="emailRegister" placeholder="Email" required autocomplete='off' value="">
                <input minlength="1" maxlength="45" id="txtSenha" type="password" name="senhaRegister" placeholder="Senha" required autocomplete='off' onkeyup="forcaSenha()" value=" ">
                <i class="fa-solid fa-eye eyeIcon" id="iconEye" onclick="showPass()"></i>
                <input minlength="1" maxlength="45" id="txtSenhaConfirmed" type="password" name="senhaConfirmRegister" placeholder="Repita a senha"  value="" required autocomplete='off' onkeyup="verificarIgualdadeSenha()">
                <button id="button">Confirmar</button>
            </form>
        </div>
        <div class="login">
            <form action="login.php" method="POST">
                <label id="lblLogin" for="chk" aria-hidden="true">Login</label>
                <div class="containerLogin">
                    <input minlength="1" maxlength="80" id="loginEmail" type="email" name="email" placeholder="Email" required>
                    <input id="loginSenha" type="password" name="senha" placeholder="Senha" required>
                    <i class="fa-solid fa-eye eyeIconLogin" id="iconEyeLogin" onclick="showPassLogin()"></i>
                    <button id="btnLogin">Login</button>
                </div>
            </form>
            <button id="esqueciSenha" class="forgotPass sx log-in">Esqueci a senha</button>
        </div>
    </div>

    <div id="container" class="container inactive-dx">
        <div class="esqueciSenha">
            <label aria-hidden="true" style="cursor: default;">Recuperar senha</label>
            <input minlength="1" maxlength="80" id="emailTextBox" class="w100" type="email" name="emailCodeValidation" placeholder="Email" reqired autocomplete='off'>
            <button id="voltar" class="form-btn sx log-in" type="button">Voltar</button>
            <input id="enviar" class="form-btn dx" type="submit" name="passwordReset" disabled/>
            <label id="info"></label>        
        </div>
    </div>

    <div class="style-switcher">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i id="toggleTheme" class="fas <?php if($_COOKIE["theme"] == "fa-sun") { echo "fa-moon"; }?>"></i>
        </div>
        <h4>Cores dos destaques</h4>
            <i class="fa fa-times closeSwitcher"></i>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1-login')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2-login')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3-login')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4-login')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5-login')"></span>
        </div>
        <div id="slider-horizontal"></div>
    </div>
    <script>
        const txtSenha = document.getElementById('txtSenha'),
        txtSenhaConfirmed = document.getElementById('txtSenhaConfirmed'),
        txtEmailRegister = document.getElementById('txtEmailRegister'),
        txtApelido = document.getElementById('txtApelido'),
        txtEmailRecuperar = document.getElementById('emailTextBox'),
        txtLoginEmail = document.getElementById('loginEmail'),
        txtSenhaLogin = document.getElementById('loginSenha');

        $(document).ready(function () //Verifica se há um apelido existente na qual o usuario requisitou ao registrar-se
        {
            $('#txtApelido').blur(function ()
            {
                var apelido = $(this).val();
                $.ajax({
                    url: "verificaApelido.php",
                    method: "POST",
                    data:{Apelido:apelido},
                    success: function(data)
                    {
                        if(data != '0')
                        {
                            txtApelido.style.borderColor = "red";
                            notify("info", "Apelido já existente!");
                            $('#button').attr("disabled", true);
                            $('#txtSenhaConfirmed').attr("disabled", true);
                        }
                        else
                        {
                            txtApelido.style.borderColor = "none";
                            txtApelido.style.borderColor = "#81ff82";
                            $('#button').attr("disabled", false);
                            $('#txtSenhaConfirmed').attr("disabled", false);
                        }
                    }
                })
            });
        });

        $(document).ready(function () //Verifica se já existe um email parecido ao registar-se
        {
            $('#txtEmailRegister').blur(function ()
            {
            var email = $(this).val();
            $.ajax({
                    url: "verificaEmail.php",
                    method: "POST",
                    data:{Email:email},
                    dataType:"text",
                    success: function(dados)
                    {
                        if(dados != '0')
                        {
                            txtEmailRegister.style.borderColor = "red";
                            notify("info", "Email já existente");
                            $('#button').attr("disabled", true);
                            $('#txtSenhaConfirmed').attr("disabled", true);
                        }
                        else
                        {
                            txtEmailRegister.style.borderColor = "none";
                            txtEmailRegister.style.borderColor = "#81ff82";
                            $('#button').attr("disabled", false);
                            $('#txtSenhaConfirmed').attr("disabled", false);
                        }
                    }
                })
            });
        });

        $(document).ready(function () //Verifica se o email existe para redefinir a senha
        {
            $('#emailTextBox').blur(function ()
            {
            var email = $(this).val();
            $.ajax({
                    url: "verificaEmail.php",
                    method: "POST",
                    data:{Email:email},
                    dataType:"text",
                    success: function(dados)
                    {
                        if(dados == '0')
                        {
                            txtEmailRecuperar.style.borderColor = "red";
                            notify("error", "Email não existe!");
                            $('#enviar').attr("disabled", true);
                        }
                        else
                        {
                            txtEmailRecuperar.style.borderColor = "none";
                            txtEmailRecuperar.style.borderColor = "#81ff82";
                            $('#enviar').attr("disabled", false);
                        }
                    }
                })
            });
        });

        $(document).ready(function () //Verifica email ao logar
        {
            $('#loginEmail').blur(function ()
            {
            var emailLogin = $(this).val();
            $.ajax({
                    url: "verificaEmail.php",
                    method: "POST",
                    data:{Email:emailLogin},
                    dataType:"text",
                    success: function(dados)
                    {
                        if(dados == '0')
                        {
                            txtLoginEmail.style.borderColor = "red";
                            $('#btnLogin').attr("disabled", true);
                            notify("error", "Email não existe!");
                        }
                        else
                        {
                            txtLoginEmail.style.borderColor = "none";
                            txtLoginEmail.style.borderColor = "#81ff82";
                            $('#btnLogin').attr("disabled", false);
                        }
                    }
                })
            });
        });

        $(document).ready(function () //Verifica se a senha que o usuário digitou é a mesma na qual usou para registrar-se
        {
            $('#loginSenha').blur(function ()
            {
            var senhaLogin = $(this).val();
            $.ajax({
                    url: "verificaLogin.php",
                    method: "POST",
                    data:{Senha:senhaLogin},
                    dataType:"text",
                    success: function(dados)
                    {
                        if(dados == '0')
                        {
                            txtSenhaLogin.style.borderColor = "red";
                            $('#btnLogin').attr("disabled", true);
                        }
                        else
                        {
                            txtSenhaLogin.style.borderColor = "none";
                            txtSenhaLogin.style.borderColor = "#81ff82";
                            $('#btnLogin').attr("disabled", false);
                        }
                    }
                })
            });
        });

        $(document).ready(function() //Solicita o envio do email para o usuario receber o código de redefinir a senha
        {
            var emailTextBox = $('#emailTextBox');
            var enviar = $("#enviar");

            enviar.click(function()
            {
                try
                {
                    notify("success", "Email enviado!");
                    $.ajax({
                        method: "POST",
                        url: "sendEmailReset.php",
                        data: emailTextBox.serialize(),
                        dataType: "json"
                    }).done(function(data)
                    {
                        if(data.sucess)
                        {
                            notify("success", "Email enviado!");
                        }
                        else
                        {
                            emailTextBox.val('');
                            notify("error", "Email não enviado!");
                        }
                    })
                }
                catch(Exception)
                {
                    notify("error","Email não enviado!");
                }
            });
        });

        function forcaSenha() //Verifica força de senha na tela de registrar
        {
            var numeros = /([0-9])/;
            var alfabeto = /([a-zA-Z])/;
            var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

            if($('#txtSenha').val().length<6)
            {
                txtSenha.style.borderColor = "red";
                $("#txtSenha").notify(
                    "Senha fraca!",
                    { position:"top center" }
                );
            }
            else
            {
                if($('#txtSenha').val().match(numeros) && $('#txtSenha').val().match(alfabeto) && $('#txtSenha').val().match(chEspeciais))
                {
                    txtSenha.style.borderColor = "none";
                    txtSenha.style.borderColor = "#81ff82";
                    $("#txtSenha").notify(
                        "Senha forte!",
                        'success'
                    );
                }
                else
                {
                    txtSenha.style.borderColor = "none";
                    txtSenha.style.borderColor = "orange";
                    $("#txtSenha").notify(
                        "Senha média!",
                        'warn'
                    );
                }
            }
        }

        function verificarIgualdadeSenha() //Verifica se as senhas são iguais na tela de registrar
        {
            if($('#txtSenha').val() != $('#txtSenhaConfirmed').val())
            {
                $("#txtSenhaConfirmed").notify(
                    "Senhas não coincidem",
                    { position:"bottom center" }
                );
                txtSenhaConfirmed.style.borderColor = "red";
                txtSenha.style.borderColor = "red";
                $('#button').attr("disabled", true);
            }else if ($('#txtSenha').val() === $('#txtSenhaConfirmed').val())
            {
                $("#txtSenhaConfirmed").notify(
                    "Ok!",
                    'success'
                );
                txtSenha.style.borderColor = "none";
                txtSenha.style.borderColor = "#81ff82";
                txtSenhaConfirmed.style.borderColor = "none";
                txtSenhaConfirmed.style.borderColor = "#81ff82";
                $('#button').attr("disabled", false);
            }
        }
        const txtNovaSenha = document.getElementById('txtNovaSenha'),
        txtNovaSenhaConfirmed = document.getElementById('txtNovaSenhaConfirmed'),
        infoPass = document.getElementById('infoPass');
        function forcaSenha2() //Verifica força de senha na tela de redefinir senha
        {
            var numeros = /([0-9])/;
            var alfabeto = /([a-zA-Z])/;
            var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

            if($('#txtNovaSenha').val().length < 6)
            {
                txtNovaSenha.style.borderColor = "red";
                $('#redefinir').attr("disabled", true);
                $("#txtNovaSenha").notify(
                    "Senha fraca!",
                    { position:"top center" }
                );
            }
            else
            {
                if($('#txtNovaSenha').val().match(numeros) && $('#txtNovaSenha').val().match(alfabeto) && $('#txtNovaSenha').val().match(chEspeciais))
                {
                    txtNovaSenha.style.borderColor = "none";
                    txtNovaSenha.style.borderColor = "#81ff82";
                    $("#txtNovaSenha").notify(
                        "Senha forte!",
                        'success'
                    );
                }
                else
                {
                    txtNovaSenha.style.borderColor = "none";
                    txtNovaSenha.style.borderColor = "orange";
                    $("#txtNovaSenha").notify(
                        "Senha média!",
                        'warn'
                    );
                }
            }
        }

        function verificarIgualdadeSenha2() //Verifica se as senhas são iguais na tela de redefinir senha
        {
            if($('#txtNovaSenha').val() != $('#txtNovaSenhaConfirmed').val())
            {
                $("#txtNovaSenhaConfirmed").notify(
                    "Senhas não coincidem",
                    { position:"bottom center" }
                );
                txtNovaSenhaConfirmed.style.borderColor = "red";
                txtNovaSenha.style.borderColor = "red";
                $('#redefinir').attr("disabled", true);
            }
            else if ($('#txtNovaSenha').val() === $('#txtNovaSenhaConfirmed').val() && $('#txtNovaSenha').val().length > 6 && $('#txtNovaSenhaConfirmed').val().length > 6)
            {
                txtNovaSenha.style.borderColor = "none";
                txtNovaSenha.style.borderColor = "#81ff82";
                txtNovaSenhaConfirmed.style.borderColor = "none";
                txtNovaSenhaConfirmed.style.borderColor = "#81ff82";
                $('#redefinir').attr("disabled", false);
                $("#txtNovaSenhaConfirmed").notify(
                    "Ok!",
                    'success'
                );
            } 
            else
            {
                infoPass.html('Digite no minimo 6 caracteres!').css('color', 'red').slideDown();
                txtNovaSenhaConfirmed.style.borderColor = "none";
                txtNovaSenhaConfirmed.style.borderColor = "#81ff82";
                $('#redefinir').attr("disabled", true);
            }
        }

        function showPass2() //Função para mostrar senha
        {
            const txtNovaSenha = document.getElementById('txtNovaSenha'),
            iconEye = document.getElementById('iconEye');
            if (txtNovaSenha.type === "password") 
            {
                txtNovaSenha.type = "text";
                iconEye.classList.remove("fa-eye");
                iconEye.classList.add("fa-eye-slash");
            } 
            else 
            {
                txtNovaSenha.type = "password";
                iconEye.classList.remove("fa-eye-slash");
                iconEye.classList.add("fa-eye");
            }
        }
        
        $(function() {
            $("#slider-horizontal").slider({
                orientation: "horizontal",
                min: 0,
                max: 360,
                value: 0,
                slide: function(event, ui) {
                    document.documentElement.style.setProperty('--skin-color', 'hsl(' + ui.value + ', 100%, 50%)');
                }
            });
        });
        $("#toggleTheme").click(function() 
        {
            if($(".fas").hasClass('fa-moon')) 
            {
                document.cookie = "theme=dark";
                event.preventDefault();
            } 
            else if($(".fas").hasClass('fa-sun'))
            {
                document.cookie = 'theme=light';
                event.preventDefault();
            }
        });
        function notify(type,message){
            (()=>{
            let n = document.createElement("div");
            let id = Math.random().toString(36).substr(2,10);
            n.setAttribute("id",id);
            n.classList.add("notification",type);
            n.innerText = message;
            document.getElementById("notification-area").appendChild(n);
            setTimeout(()=>{
                var notifications = document.getElementById("notification-area").getElementsByClassName("notification");
                for(let i=0;i<notifications.length;i++){
                if(notifications[i].getAttribute("id") == id){
                    notifications[i].remove();
                    break;
                }
                }
            },5000);
            })();
        }
        
        function notifySuccess(){
            notify("success","Email enviado!");
        }
        function notifyError(){
            notify("error","This is demo error notification message");
        }
        function notifyInfo(){
            notify("info","This is demo info notification message");
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c2eaecad4c.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="js/style-switcher-login.js"></script>
    <script src="js/scriptLogin.js"></script>
</body>
</html>