<?php
include './php/includes/checkAuthLogged.php';
include './php/includes/database.php';

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

/*$sql = "SELECT m.Nome AS 'Materia',up.Email AS 'Professor',m.Media AS 'Media', mun.Nota FROM MateriaUsuarioNota mun "
        ."INNER JOIN Materia m ON m.MateriaID = mun.MateriaID "
        ."INNER JOIN Usuario u ON u.UsuarioID = mun.UsuarioID "
        ."INNER JOIN Usuario up ON up.UsuarioID = m.UsuarioProfessorID "
        ."WHERE u.UsuarioID = base64_decode($_COOKIE['UsuarioID'])"*/
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-primary">
        <a class="navbar-brand text-light" href="#">
            <i class="fab fa-readme"></i> Portal IFSP
        </a>
        <a href="./index.html" class="text-light">
            <div>
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </div>
        </a>
    </nav>
    <div class="container justify-content-center align-items-center mt-3">
        <div class="row h-100 w-80 justify-content-center align-items-center">
            <div class="col-12">
               
                <div style="display: flex; align-items: center">
                    <div class="green-circle"></div>IP do Servidor: 192.168.0.1
                </div>
                
                <h3 class="text-center text-default">Bem vindo, Aluno</h3>
                <div style="font-style: italic" class="text-center">(ltiago90@gmail.com)</div>

                <div style="opacity: 0.5; margin: 10%">
                    <h1 class="text-center"><i class="fas fa-user-astronaut fa-2x"></i></h1>
                    <h3 class="text-center">Você não está cadastrado em nenhuma disciplina</h3>
                </div>

                <div class="shadow p-3 mb-3 bg-white rounded">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Matéria</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: #1890bd">6,5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: #1890bd">6,5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: red">6,5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: red">6,5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: #1890bd">6,5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: #1890bd">6,5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gestão de Projetos
                                </td>
                                <td>
                                    <span style="color: #1890bd">6,5</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/libs/jquery-3.3.1.min.js"></script>
</body>

</html>