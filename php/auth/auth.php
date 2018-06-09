<?php
if (isset($_POST["submit"])) {
    $email = $_POST["Email"];
    $senha = md5($_POST["Senha"]);
    $perfil = $_POST["Perfil"];

    include '../includes/database.php';

    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

    $sql = "SELECT * FROM Usuario WHERE Email = '$email' AND senha = '$senha' AND perfil = $perfil";

    $res = mysqli_query($con,$sql);

    $_SESSION["Email"] = $email;

    if((mysql_num_rows($res) != 0)){
       setcookie('UsuarioID', generateRandomString(),(time() + (3 * 24 * 3600)));

       header("Location: ../../dashboard.php");
       die();
    }else{
        $sql = "INSERT INTO Usuario VALUES($email,$senha,$perfil)";
        $res = mysqli_query($con,$sql);
        
        setcookie('UsuarioID', generateRandomString(),(time() + (3 * 24 * 3600)));
        header("Location: ../../dashboard.php");
        die();
    }
    

    mysqli_close($con);
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>