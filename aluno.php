<?php
include './php/includes/checkAuthLogged.php';
include './php/includes/database.php';

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>
<!DOCTYPE HTML>
<html>
<?php include './php/includes/header.php'; ?>
<link rel="stylesheet" href="./css/style.css">
<body>
	<?php include './php/includes/navbar.php' ?>
	<div class="container justify-content-center align-items-center mt-3">
		<div class="row h-100 w-80 justify-content-center align-items-center">
			<div class="col-12">
				
				<h3 class="text-center text-default">Bem  Vindo, Aluno</h3>
				<div style="font-style: italic" class="text-center">(<?php echo $_COOKIE['Email'] ?>)</div>

				<div class="shadow p-3 mb-3 bg-white rounded">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Matéria</th>
								<th>Professor(a)</th>
								<th>Nota</th>
								<th>Situação</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							$sql  = "SELECT m.Nome AS 'Materia', up.Email AS 'Professor', m.Media AS 'Media', mun.Nota, ";
							$sql .= "CASE WHEN m.Media > mun.Nota THEN 'Reprovado' ELSE 'Aprovado' END AS 'Situacao' ";
							$sql .= "FROM MateriaUsuarioNota mun ";
							$sql .= "INNER JOIN Materia m ON m.MateriaID = mun.MateriaID ";
							$sql .= "INNER JOIN Usuario u ON u.UsuarioID = mun.UsuarioID ";
							$sql .= "INNER JOIN Usuario up ON up.UsuarioID = m.UsuarioProfessorID ";
							$sql .= "WHERE u.UsuarioID = ".base64_decode($_COOKIE['UsuarioID']);

							$result = mysqli_query($con,$sql);
							if (mysqli_num_rows($result) > 0){
								while ($row = $result->fetch_array()){
								?>
									<tr>
										<td><?php echo $row['Materia'] ?></td>
										<td><?php echo $row['Professor'] ?></td>
										<td><?php echo $row['Nota'] ?></td>
										<td><?php echo $row['Situacao'] ?></td>
									</tr>
									<?php
								}
							}else{
							?>
							<tr>
								<td colspan="4">
									<div style="opacity: 0.6; margin: 10%;">
										<h1 class="text-center"><i class="fas fa-user-astronaut fa-2x"></i></h1>
										<h3 class="text-center">Você ainda não recebeu nenhuma nota</h3>
									</div>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./js/libs/jquery-3.3.1.min.js"></script>
</body>
</html>