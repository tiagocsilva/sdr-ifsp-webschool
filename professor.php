<?php
include './php/includes/checkAuthLogged.php';
include './php/includes/database.php';

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

$sql  = "SELECT * FROM Materia m WHERE m.UsuarioProfessorID = ".base64_decode($_COOKIE['UsuarioID']);
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	$materia_id = $row['MateriaID'];
	$materia = $row['Nome'];
}else{
	$materia_id = 0;
	$materia = "Você não está vinculado a nenhuma matéria ainda";
}

if (isset($_GET["Status"]) && ($_GET["Status"] != "")){
	if ($_GET["Status"] == 1){
		echo "<script>alert('Alterações Realizadas com Sucesso !')</script>";
	}else{
		echo "<script>alert('Ocorreu um erro em sua requisição, tente novamente !')</script>";
	}
}

?>
<html>
<?php include './php/includes/header.php'; ?>
<body>
	<?php include './php/includes/navbar.php' ?>
	<div class="container justify-content-center mt-3">
		<div class="row w-80 justify-content-center">
			<div class="col-12">
				<h3 class="text-center text-default">Bem vindo, Professor(a)</h3>
				<h6 class="text-center"><?php echo $materia ?></h6>
				<div style="font-style: italic; font-size: 12px" class="text-center">(<?php echo $_COOKIE['Email'] ?>)</div>

				<div class="shadow p-3 mb-3 bg-white rounded">
					<form id="frmNotas" method="POST" action="./php/action/notas.php">
						<input type="hidden" name="MateriaID" id="MateriaID" value="<?php echo $materia_id ?>">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Aluno</th>
									<th>Nota</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM Usuario WHERE Perfil = 1";
								$result = mysqli_query($con,$sql);
								
								if (mysqli_num_rows($result) > 0){
									while ($row = $result->fetch_array()){
										$sqlNotas = "SELECT * FROM MateriaUsuarioNota WHERE UsuarioID = ".$row['UsuarioID']." AND MateriaID = ".$materia_id;
										$resultNotas = mysqli_query($con,$sqlNotas);

										if (mysqli_num_rows($resultNotas) > 0){
											$rowNotas = mysqli_fetch_assoc($resultNotas);
											
											$disableField = "";
											$nota = $rowNotas['Nota'];
										}else{
											$disableField = "";
											$nota = "";
										}
									?>
									<tr <?php echo $disableField ?>>
										<td><?php echo $row['Email'] ?></td>
										<td>
											<input <?php echo $disableField ?> class="form-control badge-input p-2 bg-secondary" id="Nota_<?php echo $row['UsuarioID']?>" name="Nota_<?php echo $row['UsuarioID']?>" maxlength="3" type="text" value="<?php echo $nota ?>" onkeyup="changeColor(this);">
										</td>
									</tr>
									<?php
									}
								}else{
								?>
								<tr>
									<td colspan="2">
										<div style="opacity: 0.5; margin: 10%">
											<h1 class="text-center"><i class="fas fa-user-astronaut fa-2x"></i></h1>
											<h3 class="text-center">No momento, não temos alunos cadastrados...</h3>
										</div>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>

						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-primary btn-block"><i class="far fa-save"></i>&nbsp;&nbsp;Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./js/libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
	function changeColor(element){
		$(element).removeClass("bg-success");
		$(element).removeClass("bg-primary");
		$(element).removeClass("bg-danger");
		$(element).removeClass("bg-secondary");
		$(element).removeClass("bg-warning");
		
		if (element.value > 6 && element.value <= 10){
			$(element).addClass("bg-success");
		}else if (element.value > 10){
			$(element).addClass("bg-warning");
		}else if (element.value == 6){
			$(element).addClass("bg-primary");
		}else if (element.value == 0){
			$(element).addClass("bg-secondary");
		}else{
			$(element).addClass("bg-danger");
		}
	}
	$(document).ready(function() {
		$(".form-control").each(function() {
			changeColor(this);
		});
	});
	</script>
</body>
</html>
<?php mysqli_close($con); ?>