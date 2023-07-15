<!-- <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/teste.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="percent" style="--clr:#04fc43;--num:85;">
                <div class="dot"></div>
                <svg>
                    <circle cx="70" cy="70" r="70"></circle>
                    <circle cx="70" cy="70" r="70"></circle>
                </svg>
                <div class="number">
                    <h2>85<span>%</span></h2>
                    <p>HTML</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="percent" style="--clr:#fee800;--num:70;">
                <div class="dot"></div>
                <svg>
                    <circle cx="70" cy="70" r="70"></circle>
                    <circle cx="70" cy="70" r="70"></circle>
                </svg>
                <div class="number">
                    <h2>70<span>%</span></h2>
                    <p>HTML</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="percent" style="--clr:#ff00be;--num:60;">
                <div class="dot"></div>
                <svg>
                    <circle cx="70" cy="70" r="70"></circle>
                    <circle cx="70" cy="70" r="70"></circle>
                </svg>
                <div class="number">
                    <h2>60<span>%</span></h2>
                    <p>HTML</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="percent" style="--clr:#06ccff;--num:45;">
                <div class="dot"></div>
                <svg>
                    <circle cx="70" cy="70" r="70"></circle>
                    <circle cx="70" cy="70" r="70"></circle>
                </svg>
                <div class="number">
                    <h2>45<span>%</span></h2>
                    <p>HTML</p>
                </div>
            </div>
        </div>
    </div>
    <input id="imageFile" name="imageFile" type="file" class="imageFile"  accept="image/*"   /> 
    <input type="button" value="Resize Image"  onclick="ResizeImage()"/> 
    <br/>
    <img src="" id="preview"  >
    <img src="" id="output">
    <script>
        var btn = document.querySelector(".btn");
        const detectDeviceType = () => /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? btn.innerHTML = '<i class="fa fa-mobile"></i>' : btn.innerHTML = '<i class=" fa fa-desktop"></i>';
        detectDeviceType();
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/c2eaecad4c.js"></script>  <!-- script para ler os icones -->
</body>
</html> -->

<?php
// $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
// echo $isMob
//   ? '<i class="fa fa-mobile"></i>'
//   : '<i class=" fa fa-desktop"></i>' ;
$dataAgora = date("Y-m-d H:i:s", strtotime("-3 hours"));
echo $dataAgora;
?>