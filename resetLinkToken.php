<?php
if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    include "db.php";

    $emailId = $_POST['email'];

    $result = mysqli_query($conn, "SELECT * FROM Usuario WHERE Email = '" . $emailId . "'");

    $row= mysqli_fetch_array($result);

    if($row)
    {
        $token = md5($emailId).rand(10,9999);

        $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );

        $expDate = date("Y-m-d H:i:s",$expFormat);

        $update = mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
    }
}
?>