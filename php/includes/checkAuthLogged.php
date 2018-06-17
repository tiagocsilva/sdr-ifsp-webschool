<?php
if (!(isset($_COOKIE['UsuarioID'])) || $_COOKIE["UsuarioID"] == ""){
    header("Location: index.html");
}
?>