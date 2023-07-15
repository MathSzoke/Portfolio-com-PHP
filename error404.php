<?php
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
    <title>Error 404</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBACAAAAAACwAAAAFgAAACgAAAAQAAAAIAAAAAEAAQAAAAAAQAAAAAAAAAAA
    AAAAAgAAAAAAAAAAAAAAAAD
    /AAAAAAB//gAAf/4AAD58AAA+fAAAH
    /gAAB54AAAOcAAADnAAAAZgAAAGYAAAAkAAAAPAAAABgAAAAYAAAAAAAAAAAAAAAAAAAAAAAACAAQAAgAEAAMADAADAAwAA4
    AcAAOAHAADwDwAA8A8AAPgfAAD4HwAA/D8AAPw/AAD+fwAA" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="css/error404Layout.css">
    <link rel="stylesheet" href="css/style-switcher-error404.css">
    <link rel="stylesheet" href="css/skinsError404/color-1-error404.css">
    <link rel="stylesheet" href="css/skinsError404/color-1-error404.css" class="alternate-style" title="color-1-error404" disabled>
    <link rel="stylesheet" href="css/skinsError404/color-2-error404.css" class="alternate-style" title="color-2-error404" disabled>
    <link rel="stylesheet" href="css/skinsError404/color-3-error404.css" class="alternate-style" title="color-3-error404" disabled>
    <link rel="stylesheet" href="css/skinsError404/color-4-error404.css" class="alternate-style" title="color-4-error404" disabled>
    <link rel="stylesheet" href="css/skinsError404/color-5-error404.css" class="alternate-style" title="color-5-error404" disabled>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/notify.min.js"></script>
    <script src="js/notify.js"></script>
</head>
<body class="<?php echo $class ?>">
    <div class="logo">
        <a><span>M</span>ath</a>
    </div>
    <div class="image">
        <div class="box">
            <div class="eye"></div>
            <div class="eye"></div>
        </div>
    </div>
    <div class="conteudos">
        <strong><p>Oops, parece que você entrou em uma página que não existe!</p></strong>
        <a href="home" class="textBtn"><button id="button">Ir para home</button></a>
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
            <span class="color-1" onclick="setActiveStyle('color-1-error404')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2-error404')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3-error404')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4-error404')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5-error404')"></span>
        </div>
    </div>
    <script>
        document.querySelector('body').addEventListener('mousemove', eyeball);
        function eyeball()
        {
            const eye = document.querySelectorAll('.eye');
            eye.forEach(function(eye)
            {
                let x = (eye.getBoundingClientRect().left) + (eye.clientWidth / 2);
                let y = (eye.getBoundingClientRect().top) + (eye.clientWidth / 2);

                let radian = Math.atan2(event.pageX - x, event.pageY - y);
                let rotation = (radian * (180 / Math.PI) * -1) + 270;
                eye.style.transform = "rotate(" + rotation + "deg)";
            })
        }
        
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
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c2eaecad4c.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/style-switcher-error404.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
</body>
</html>
