<?php
include './php/includes/checkAuthLogged.php';
include './php/includes/database.php';

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>
<html>
<?php include './php/includes/header.php'; ?>
<body>
    <?php include './php/includes/navbar.php' ?>
    <div class="container justify-content-center mt-3">
        <div class="row w-80 justify-content-center">
            <div class="col-12">
                <div style="opacity: 0.5; margin: 10%">
                    <h1 class="text-center"><i class="fas fa-user-astronaut fa-2x"></i></h1>
                    <h3 class="text-center"s>No momento não temos alunos cadastrados...</h3>
                </div>
                
            <h3 class="text-center text-default">Bem vindo, Professor(a)</h3>
                <h6 class="text-center">Gestão de Projetos</h6>
                <div style="font-style: italic; font-size: 12px" class="text-center">(professor@gmail.com)</div>

                <div class="shadow p-3 mb-3 bg-white rounded">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Aluno</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    bonitopakas@gmail.com
                                </td>
                                <td>
                                    <input class="form-control badge-input p-2 bg-success" maxlength="3" type="text">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    guzao@gmail.com
                                </td>
                                <td>
                                    <input class="form-control badge-input p-2 bg-success" maxlength="3" type="text">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    buge@ibm.com
                                </td>
                                <td>
                                    <input class="form-control badge-input p-2 bg-success" maxlength="3" type="text">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BrunoPeidoDeDifunto@ibm.com
                                </td>
                                <td>
                                    <input class="form-control badge-input p-2 bg-success" maxlength="3" type="text">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <button class="btn"><i class="far fa-save"></i> Salvar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/libs/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./js/validation.js"></script>
</body>
</html>