<?php
include '../includes/checkAuthLogged.php';
if (isset($_POST["submit"])) {
    $materiaID = $_POST['MateriaID'];

    foreach($_POST as $key => $value) {
        if ($key != "MateriaID"){
            $usuarioID = @explode("_","$key")[1];
            $nota = $value;
        
            if ($nota != ""){
                include '../includes/database.php';

                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
                
                $sql = "SELECT * FROM MateriaUsuarioNota WHERE MateriaID = ".$materiaID." AND UsuarioID = ".$usuarioID;
                $result = mysqli_query($con,$sql);
            
                if (mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);

                    mysqli_query($con,"UPDATE MateriaUsuarioNota SET Nota = ".$nota." WHERE MateriaID = ".$materiaID." AND UsuarioID = ".$usuarioID);
                    $sucesso = true;
                }else{
                    $sqlInsereNota = "INSERT INTO MateriaUsuarioNota(MateriaID,UsuarioID,Nota) VALUES($materiaID,$usuarioID,$nota)";

                    if (mysqli_query($con, $sqlInsereNota)) {
                        $sucesso = true;
                    }else{
                        $sucesso = false;
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                }
            }
        }
    }

    if (!isset($sucesso)){
        header("Location: ../../professor.php");
    }
    else if ($sucesso){
        header("Location: ../../professor.php?Status=1");
    }else{
        header("Location: ../../professor.php?Status=2");
    }

    die();
    mysqli_close($con);
}
?>