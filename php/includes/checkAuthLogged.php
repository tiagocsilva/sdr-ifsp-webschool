<?php
session_start();
if (isset($_COOKIE['UsuarioID']) && $_COOKIE["UsuarioID"] != ""){
    header("Location: ../../index.html");
    die();  
}
?>