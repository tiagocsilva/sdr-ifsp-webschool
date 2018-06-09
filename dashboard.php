<?php
include './php/includes/checkAuthLogged.php';
include './php/includes/database.php';

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

/*$sql = "SELECT m.Nome AS 'Materia',up.Email AS 'Professor',m.Media AS 'Media', mun.Nota FROM MateriaUsuarioNota mun "
        ."INNER JOIN Materia m ON m.MateriaID = mun.MateriaID "
        ."INNER JOIN Usuario u ON u.UsuarioID = mun.UsuarioID "
        ."INNER JOIN Usuario up ON up.UsuarioID = m.UsuarioProfessorID "
        ."WHERE u.UsuarioID = $_COOKIE['UsuarioID']"*/
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
            crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Notas</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Matéria</th>
                                <th scope="col">Professor</th>
                                <th scope="col">Média</th>
                                <th scope="col">Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gestão de Projetos</td>
                                <td>Dani Marques</td>
                                <td>6</td>
                                <td>8.5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./js/libs/jquery-3.3.1.min.js"></script>
    </body>
</html>