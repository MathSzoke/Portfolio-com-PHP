<?php
include('verificaLogin.php');
session_start();
if(!isset($_SESSION['email']))
{
    echo "Você não está logado.";
    header('Location: index.php');
}

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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matheus Szoke</title>
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/notify.css">
    <style><?php include "css/style.css"; include "css/perfil.css"; ?></style>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/skins/color-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/skins/color-1.css" class="alternate-style" title="color-1" disabled>
    <link rel="stylesheet" href="css/skins/color-2.css" class="alternate-style" title="color-2" disabled>
    <link rel="stylesheet" href="css/skins/color-3.css" class="alternate-style" title="color-3" disabled>
    <link rel="stylesheet" href="css/skins/color-4.css" class="alternate-style" title="color-4" disabled>
    <link rel="stylesheet" href="css/skins/color-5.css" class="alternate-style" title="color-5" disabled>
    <link rel="stylesheet" href="css/style-switcher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/notify.js"></script>
</head>
<body class="<?php echo $class ?>">
    <div class="aside" id="aside">
        <div class="logo">
            <a><span>M</span>ath</a>
        </div>
        <div class="nav-toggler">
            <span></span>
        </div>
        <ul class="nav">
            <li><a href="#home" class="active"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#about"><i class="fa fa-user"></i>Sobre</a></li>
            <li><a href="#services"><i class="fa fa-list"></i>Serviços</a></li>
            <li><a href="#portfolio"><i class="fa fa-briefcase"></i>Portfolio</a></li>
            <li><a href="#contact"><i class="fa fa-comments"></i>Contato</a></li>
        </ul>
    </div>
    <div id="notification-area"></div>

    <div class="main-content">
        <section class="home active section" id="home">
            <div class="container">
                <div class="row">
                    <div class="home-info padd-15">
                        <h3 class="hello">Olá, meu nome é <span class="name">Matheus Szoke</span></h3>
                        <h3 class="my-profession">Eu sou um <span class="typing">Desenvolvedor de Software</span></h3>
                        <p>Sou desenvolvedor de software com vasta experiência há mais de 2 anos. 
                            Minha experiência é desenvolvimento FullStack, ideias lógicas para o funcionamento interno de um software, 
                            desenvolvimento de Banco de Dados e uma experiência leve com front-end,
                            que tento aplicar no meu dia a dia com o back-end, e muito mais...</p>
                        <a href="files/MatheusSzoke_Curriculo.pdf" class="btn" target="_blank">Ver curriculo</a>
                    </div>
                    <div class="home-img padd-15">
                        <img src="images/me.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
    
        <section class="about section" id="about">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Sobre mim</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="about-content padd-15">
                        <div class="row">
                            <div class="about-text padd-15">
                                <h3>Eu sou Matheus Henrique Szoke La Motta e <span>Desenvolvedor de aplicações web</span></h3>
                                <p>Comecei a estudar programação muito antes de ter iniciado em uma graduação. A partir dos estudos básicos,
                                    comecei a me identificar mais com a área, comecei pelo básico como HTML e CSS, e parti para back-end,
                                    onde eu vi que faria mais sentido eu entrar numa área mais profunda quando eu já sabia que eu não tenho a menor
                                    lógica de qualidade visual para um cliente, porém, após conseguir um estágio na área e vendo como funciona as
                                    duas áreas (front-end e back-end), minha noção para ambas cresceu apenas, e estou determinado a evoluir ainda mais.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="personal-info padd-15">
                                <div class="row">
                                    <div class="info-item padd-15">
                                        <p>Nasci em: <span>08 dec 2001</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Idade: <span>20</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Website: <span>www.mathszoke.com</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Email: <span>Matheusszoke@gmail.com</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Graduação: <span>ADS & CC</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Celular: <span>+55 (11) 991388-1138</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Cidade: <span>São Paulo</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Freelance: <span>Disponível</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="buttons padd-15">
                                        <a href="#contact" data-section-index="1" class="btn hire-me">Contate-me</a>
                                    </div>
                                </div>
                            </div>
                            <div class="skills padd-15">
                                <div class="row">
                                    <div class="skill-item padd-15">
                                        <h5>HTML</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:67%;"></div>
                                            <div class="skill-percent">67%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>CSS</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:67%;"></div>
                                            <div class="skill-percent">67%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>Java Script</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:59%;"></div>
                                            <div class="skill-percent">59%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>C#</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:34%;"></div>
                                            <div class="skill-percent">34%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>PHP</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:60%;"></div>
                                            <div class="skill-percent">60%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>Python</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:24%;"></div>
                                            <div class="skill-percent">24%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>SQL Server</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:45%;"></div>
                                            <div class="skill-percent">45%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>Git</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:30%;"></div>
                                            <div class="skill-percent">30%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="education padd-15">
                                <h3 class="title">Educação</h3>
                                <div class="row">
                                    <div class="timeline-box padd-15">
                                        <div class="timeline shadow-dark">
                                            <div class="timeline-item">
                                                <div class="circle-dot">
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> out 2021 - dez 2023
                                                    </h3>
                                                    <h4 class="timeline-title">Graduação Análise e Desenvolvimento de
                                                        Sistemas</h4>
                                                    <p class="timeline-text">- Atualmente no segundo semestre.
                                                        <br/>
                                                        Iniciei a minha graduação em ADS com intenção de me aprofundar mais na área de tecnologia, após ter iniciado
                                                        um curso técnico em programação que falhou infelizmente pois a instituição de ensino faliu...
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="circle-dot">
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> mar 2022 - 2026
                                                    </h3>
                                                    <h4 class="timeline-title">Graduação Ciência da Computação</h4>
                                                    <p class="timeline-text">- Atualmente no primeiro semestre.
                                                        <br />
                                                        Alguns meses depois de ter iniciado a graduação em ADS e ter analisado mais o que ensinam e a grade,
                                                        percebi que é a minha área realmente, mas também, notei que ADS é apenas um curso técnico, por isso,
                                                        iniciei em mais uma graduação e na qual me vejo aprendendo mais profundamente a arte da programação.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="circle-dot">
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2020 - ...
                                                    </h3>
                                                    <h4 class="timeline-title">Cursos online</h4>
                                                    <p class="timeline-text">
                                                        - Curso tecnico pelo Arbyte (a empresa faliu e eu não conclui o curso) <br />
                                                        - Cursos especializantes pelo Alura<br />
                                                        - C#, Lógica de programação, Modelagem de Banco de Dados, SQL Server, Python, PHP,
                                                        JavaScript, HTML e CSS, Oracle Database, MySQL Server. <br />
                                                        Cursos feitos com intenções nítidas de me aprimorar na programação, e principalmente a lidar com consequencias,
                                                        aprender a lidar com erros de sistemas, e a lógica toda por trás, cursos feitos pelo Alura são perfeitos,
                                                        além de existir vários tipos de cursos de várias linguagens, as video-aulas são bem didáticas e explicativas.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="experience padd-15">
                                <h3 class="title">Experiência</h3>
                                <div class="row">
                                    <div class="timeline-box padd-15">
                                        <div class="timeline shadow-dark">
                                            <div class="timeline-item">
                                                <div class="circle-dot">
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> abril 2021 - out 2021
                                                    </h3>
                                                    <h4 class="timeline-title">Estágio em Programação C#</h4>
                                                    <p class="timeline-text">No meio do ano de 2021, em meu primeiro semestre da faculdade em que eu cursava (Estácio),
                                                        consegui o meu primeiro trabalho, sendo o mesmo um estágio exatamente da minha área, onde me identifiquei muito.
                                                        Apesar de ter aprendido o suficiente sobre como funciona uma empresa e como funciona a área back-end de uma empresa,
                                                        eu precisei sair por questões pessoais e porquê era um trabalho razoavelmente longe e que pagava muito pouco para 
                                                        a faculdade em que eu frequentava. <br />
                                                        Além da vaga dizer que era C# a linguagem a ser utilizada, na verdade eu sempre utilizei Java lá...
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="circle-dot">
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> jan 2022 - ...
                                                    </h3>
                                                    <h4 class="timeline-title">Estágio em Programação FullStack</h4>
                                                    <p class="timeline-text">Este é o meu segundo emprego, e segundo estágio na mesma área em que eu consegui novamente
                                                        no primeiro semestre de outra faculdade em que agora estou cursando e não irei sair. <br />
                                                        Vaga muito boa, 100% remota, Fullstack e estou adorando participar dessa oportunidade,
                                                        único problema é que a aplicação utilizada é bem antiga... Não vejo vantagem em participar
                                                        de uma empresa que não é atualizada constantemente enquanto o mundo atualiza, apesar de adquirir a expêriencia de trabalhar
                                                        numa aplicação feita 100% a mão.
                                                        Isso abre "N" portas para ocupar outra vaga de outra empresa que demonstra interesse
                                                        em ser atualizado constantemente. <br />
                                                        Mas apesar disso, é excelente todo o resto, a administração, a moderação, a equipe de DEV... E o bom é que 
                                                        aprendo a utilizar aplicações antigas e lidar com os problemas que ocorrem. Creio que com linguagens novas atualizadas
                                                        ocorram menos problemas e caso ocorra eu saiba resolver.
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    
        <section class="service section" id="services">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Serviços</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="service-item padd-15">
                        <div class="service-item-inner">
                            <div class="icon">
                                <i class="fa fa-laptop-code"></i>
                            </div>
                            <h4 style="cursor: default;user-select: none;">Desenvolvimento de Sistema Web</h4>
                            <p style="cursor: default;user-select: none;">Desenvolvo sistemas novos para aplicações já existentes, ou, faço manutenções para o mesmo (utilizo apenas as linguagens nas quais
                                me referi como aprendido em meu status na aba Sobre).</p>
                        </div>
                    </div>
                    <div class="service-item padd-15">
                        <div class="service-item-inner">
                            <div class="icon">
                                <i class="fa fa-code"></i>
                            </div>
                            <h4 style="cursor: default;user-select: none;">Desenvolvimento de Páginas Web</h4>
                            <p style="cursor: default;user-select: none;">Desenvolvo páginas com API's e bibliotecas que os deixam responsivos, juntamente com a minha praticidade,
                                tento os deixar o mais belo e com o visual mais "clean" possível.
                            </p>
                        </div>
                    </div>
                    <!--<div class="service-item padd-15">
                        <div class="service-item-inner">
                            <div class="icon">
                                <i class="fa fa-mobile-alt"></i>
                            </div>
                            <h4 style="cursor: default;user-select: none;">Desenvolvimento Mobile</h4>
                            <p style="cursor: default;user-select: none;">Desenvolvimento para Mobile Aplicações, tanto front-end como back-end (utilizo apenas as linguagens Clojure e Kotlin).</p>
                        </div>
                    </div>-->
                    <!-- <div class="service-item padd-15">
                        <div class="service-item-inner">
                            <div class="icon">
                                <i class="fa fa-palette"></i>
                            </div>
                            <h4>Web development</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus similique nihil
                                dolore!</p>
                        </div>
                    </div> -->
                    <div class="service-item padd-15">
                        <div class="service-item-inner">
                            <div class="icon">
                                <i class="fa fa-database"></i>
                            </div>
                            <h4 style="cursor: default;user-select: none;">Desenvolvimento de Banco de Dados</h4>
                            <p style="cursor: default;user-select: none;">Apesar de ser bem mais complexo, posso desenvolver sistemas de Banco de dados, como Procs, Views e Triggers. Porém, isso exige
                                uma documentação do site e dos sistemas do mesmo (utilizo apenas SQL Server, MySQL).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="portfolio section" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Portfólio</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="portfolio-heading padd-15">
                        <h2>Meus últimos projetos:</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="portfolio-item padd-15">
                        <div class="portfolio-item-inner shadow-dark">
                            <div class="portfolio-img">
                                <!-- <img src="images/portfolio/portfolio-1.jpg" alt=""> -->
                                <h1 class="contact-title">VÁZIO, por enquanto.</h3>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="portfolio-item padd-15">
                        <div class="portfolio-item-inner shadow-dark">
                            <div class="portfolio-img">
                                <img src="images/portfolio/portfolio-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item padd-15">
                        <div class="portfolio-item-inner shadow-dark">
                            <div class="portfolio-img">
                                <img src="images/portfolio/portfolio-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item padd-15">
                        <div class="portfolio-item-inner shadow-dark">
                            <div class="portfolio-img">
                                <img src="images/portfolio/portfolio-4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item padd-15">
                        <div class="portfolio-item-inner shadow-dark">
                            <div class="portfolio-img">
                                <img src="images/portfolio/portfolio-5.jpg" alt="">
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <section class="contact section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>
                            Contate-me
                        </h2>
                    </div>
                </div>
                <h3 class="contact-title padd-15">Você possui alguma dúvida?</h3>
                <h4 class="contact-sub-title padd-15">Estou ao seu dispôr</h4>
                <div class="row">
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <h4>Ligue-me</h4>
                        <a style="font-size: 16px" class="contact-title" href="" target="_blank">+55 (11) 99138-1138</a>
                    </div>
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-linkedin-square"></i></div>
                        <h4>LinkedIn</h4>
                        <a style="font-size: 16px" class="contact-title" href="https://www.linkedin.com/in/matheus-henrique-szoke-la-motta-b819241a5/" target="_blank">Matheus Szoke</a>
                    </div>
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-envelope"></i></div>
                        <h4>Email</h4>
                        <a href="#name" style="font-size: 16px" class="contact-title">matheusszoke@gmail.com</a>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon"><i class="fa fa-whatsapp" title="Whatsapp"></i></div>
                        <h4>WhatsApp</h4>
                        <a style="font-size: 16px" class="contact-title" href="https://api.whatsapp.com/send?phone=5511991381138&" target="_blank">+55 (11) 99138-1138</a>
                    </div>
                </div>
                <h3 class="contact-title padd-15">Me envie um email</h3>
                <h4 class="contact-sub-title padd-15">Sou muito receptivo às mensagens</h4>
                <form id="form" action="sendEmailContact.php" method="POST">
                    <div class="row">
                        <div class="contact-form padd-15">
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input class="form-control" type="text" value="<?php echo $_SESSION['apelido'] ?>" name="name" id="name" required="" placeholder="Nome" maxlength="70">
                                    </div>
                                </div>
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>" placeholder="Email" required="" maxlength="80">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input class="form-control" type="subject" name="subject" id="subject" value="" placeholder="Assunto" required="" maxlength="255">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="message" rows="5" required="" placeholder="Mensagem" maxlength="8000"></textarea>
                                        <p id="written"></p>
                                        <p id="remaining"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <button id="submit" class="btn">Enviar mensagem</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <div class="style-switcher">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i id="toggleTheme" class="fas <?php if($_COOKIE["theme"] == "fa-sun") { echo "fa-moon"; }?>"></i>
        </div>
        <div class="s-icon logout" style="top: -55px;">
            <a href="logout.php" class="iconLogout"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        </div>
        <div class="style-switcher perfil">
            <h4 id="margin10px">Olá, <br /><a style="color: var(--skin-color);font-size: 12px;"><?php 
            $name = $_SESSION['apelido'];
            
            $split_name = explode(" ", $name);

            if(count($split_name) > 2)
            {
                for($i = 1; (count($split_name) - 1) > $i; $i++)
                {
                    if(strlen($split_name[$i]) >  3)
                    {
                        $split_name[$i] = substr($split_name[$i],0,1).".";
                    }
                }
            }
            echo implode(" ", $split_name);
             ?><div id="app">
                <script type="text/javascript">
                    var sessionName = '<?php echo $session = $_SESSION['apelido']; ?>';
                    var sessionEmail = '<?php echo $sessionEmail = $_SESSION['email']; ?>';

                    var icons = '<?php $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
                    echo $isMob ? 'device-image fa fa-mobile' : 'device-image fa fa-desktop'; ?>'
                    
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
                </script>
             </div></a></h4>
            <div class="imgPerfil">
                <div class="openPerfil">
                    <a href="#perfil"><i id="iconPerfil" class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
        <h4>Cores dos destaques</h4>
        <i class="fa fa-times closeSwitcher"></i>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5')"></span>
        </div>
        <div id="slider-horizontal"></div>
    </div>

    <script type="text/javascript">
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
        var idleMax = 5;  //(5 min)
        var idleTime = 0;
        (function ($) {

            $(document).ready(function () {

                $('*').bind('mousemove keydown scroll', function () {
                    idleTime = 0; 
                    var idleInterval = setInterval("timerIncrement()", 1800000); //30 min
            });
                $("body").trigger("mousemove");

            });
        }) (jQuery)
        function timerIncrement() 
        {
            idleTime = idleTime + 1;
            if (idleTime > idleMax) { 
                window.location="logout.php";
            }
        }
        $(document).ready(function()
        {
            var submit = $("#submit");

            submit.click(function()
            {
                notify("success", "Mensagem enviada!");
            });
        });

        function notify(type, message)
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
                for(let i=0;i<notifications.length;i++)
                {
                    if(notifications[i].getAttribute("id") == id)
                    {
                        notifications[i].remove();
                        break;
                    }
                }
            },5000);
            })();
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c2eaecad4c.js"></script>  <!-- script para ler os icones -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/0.14.7/react-with-addons.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/0.14.7/react-dom.js'></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/style-switcher.js"></script>
    <script src="js/perfil.js"></script>
</body>
</html>