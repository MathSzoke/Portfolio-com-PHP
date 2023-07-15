<?php 
error_reporting(E_ALL);
require_once('class_ChkCode.php');
session_start();


// IF THERE IS A POST-REQUEST
if (!empty($_POST))
{
    $status = FormToken::check();
    if (!$status) echo "Attack! Run like hell!";
    if ( $status) echo "Success! Trust this client.";
    exit;
}


$html = <<<EOF
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8" />
<title>A Variable Form Token Example</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>

<script>
$(document).ready(function(){
    $.get("server_ChkCode.php", function(response){
        var json = JSON.parse(response);
        var myForm = document.forms['my_form'];
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = json.name;
        input.value = json.token;
        myForm.appendChild(input);
    });
});
</script>

</head>
<body>

<form name="my_form" method="post">
<input type="submit" value="Verify Token" />
</form>

</body>
</html>
EOF;

echo $html;