<?php
include 'db.php';

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
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="css/styleResetPass.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="css/notify.css">
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
    <script src="js/notify.js"></script>
</head>
<body class="<?php echo $class ?>">
    <div class="logo">
        <a><span>M</span>ath</a>
    </div>
    <div id="notification-area"></div>
    <?php
    if($_GET['key'] && $_GET['token'])
    {
        $email = $_GET['key'];
        $token = $_GET['token'];
        $query = mysqli_query($conexao, "SELECT HoraExpira FROM EsqueciSenha WHERE resetLinkToken = '".$token."' AND Email = '".$email."'");
        $dataAgora = date("H:i:s", strtotime("-3 hours"));
        $verificarUsado = mysqli_query($conexao, "SELECT Usado FROM EsqueciSenha WHERE resetLinkToken = '".$token."' AND Email = '".$email."'");
        $rowUsado = mysqli_fetch_array($verificarUsado);
        $row = mysqli_fetch_array($query);

        if (mysqli_num_rows($query) > 0) 
        {
            if($row['HoraExpira'] > $dataAgora)
            { 
                ?>
                <div id="containerReset" class="containerResetPass">
                    <form class="redefinirSenha" method="POST" action="updatePass">
                        <h4 id="titleRedefinirSenha">Redefinir senha</h4>
                        <label class="emailLbl"><?php echo $email; ?></label>
                        <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input type="hidden" name="token" value="<?php echo $token;?>">
                        <input minlength="6" maxlength="45" id="txtNovaSenha" type="password" name="senhaReset" placeholder="Senha" required autocomplete='off' onkeyup="forcaSenha()">
                        <i class="fa-solid fa-eye eyeIcon" id="iconEye" onclick="showPass2()"></i>
                        <input minlength="6" maxlength="45" id="txtNovaSenhaConfirmed" type="password" name="senhaResetConfirmed" placeholder="Repita a senha" required autocomplete='off' onkeyup="verificarIgualdadeSenha()">
                        <div class="buttons">
                            <button id="voltarRedefinir" class="form-btn sx log-in" onclick="location.href='/';">Voltar</button>
                            <input id="redefinir" class="form-btn dx" type="submit" name="alterPass" />
                        </div>
                    </form>
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="main" style="display: flex;justify-content: center;align-items: center;">
                    <div class="redefinirSenha">
                        <label>O seu link está expirado</label>
                        <button id="voltarRedefinir" class="form-btn sx log-in"><a href="index.php" class="textBtn" style="color: white;text-decoration: none;">Voltar</a></button>
                    </div>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="main" style="display: flex;justify-content: center;align-items: center;">
                <div class="redefinirSenha">
                    <label>O seu link está expirado</label>
                    <button id="voltarRedefinir" class="form-btn sx log-in"><a href="index.php" class="textBtn" style="color: white;text-decoration: none;">Voltar</a></button>
                </div>
            </div>
            <?php
        }
    }
    ?>
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
    const txtNovaSenha = document.getElementById('txtNovaSenha');
    const txtNovaSenhaConfirmed = document.getElementById('txtNovaSenhaConfirmed');
    function forcaSenha() //Verifica força de senha na tela de redefinir senha
    {
        var numeros = /([0-9])/;
        var alfabeto = /([a-zA-Z])/;
        var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        if($('#txtNovaSenha').val().length < 6)
        {
            txtNovaSenha.style.borderColor = "red";
            $('#redefinir').attr("disabled", true);
        }
        else
        {
            if($('#txtNovaSenha').val().match(numeros) && $('#txtNovaSenha').val().match(alfabeto) && $('#txtNovaSenha').val().match(chEspeciais))
            {
                txtNovaSenha.style.borderColor = "none";
                txtNovaSenha.style.borderColor = "#81ff82";
                notify("success", "Senha forte");
            }
            else
            {
                txtNovaSenha.style.borderColor = "none";
                txtNovaSenha.style.borderColor = "orange";
                notify("info", "Senhas média");
            }
        }
    }
    function verificarIgualdadeSenha() //Verifica se as senhas são iguais na tela de redefinir senha
    {
        if($('#txtNovaSenha').val() != $('#txtNovaSenhaConfirmed').val())
        {
            txtNovaSenhaConfirmed.style.borderColor = "red";
            txtNovaSenha.style.borderColor = "red";
            $('#redefinir').attr("disabled", true);
        }else if ($('#txtNovaSenha').val() === $('#txtNovaSenhaConfirmed').val())
        {
            notify("success", "Ok!");
            txtNovaSenha.style.borderColor = "none";
            txtNovaSenha.style.borderColor = "#81ff82";
            txtNovaSenhaConfirmed.style.borderColor = "none";
            txtNovaSenhaConfirmed.style.borderColor = "#81ff82";
            $('#redefinir').attr("disabled", false);
        }
    }
    function showPass2() //Função para mostrar senha
    {
        const iconEye = document.getElementById('iconEye');
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
    $(document).ready(function() //Solicita o envio do email para o usuario receber o código de redefinir a senha
    {
        var emailTextBox = $('#emailTextBox');
        var redefinir = $("#redefinir");
        redefinir.click(function()
        {
            if($('#txtNovaSenha').val() != $('#txtNovaSenhaConfirmed').val())
            {
                notify("info", "Senhas não coincidem");
                txtNovaSenhaConfirmed.style.borderColor = "red";
                txtNovaSenha.style.borderColor = "red";
                event.preventDefault();
            }
            else if ($('#txtNovaSenha').val() === $('#txtNovaSenhaConfirmed').val())
            {
                notify("success", "Sua senha foi redefinida!");
            }
        });
    });

    var idleMax = 5;  //(5 min)
    var idleTime = 0;
    (function ($) 
    {
        $(document).ready(function () 
        {
            $('*').bind('mousemove keydown scroll', function () 
            {
                idleTime = 0; 
                var idleInterval = setInterval("timerIncrement()", 300000); //5 min
            });
            $("body").trigger("mousemove");
        });
    }) (jQuery)
    function timerIncrement() 
    {
        idleTime = idleTime + 1;
        if (idleTime > idleMax) { 
            window.location="/";
        }
    }
    $(function() 
    {
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
    function notify(type,message)
    {
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
    function notifySuccess()
    {
        notify("success","Sucesso");
    }
    function notifyError()
    {
        notify("error","Erro");
    }
    function notifyInfo()
    {
        notify("info","Atenção!");
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