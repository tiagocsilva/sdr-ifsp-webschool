<?php
if (isset($_POST["submit"])) {
	$email = $_POST["Email"];
	$senha = md5($_POST["Senha"]);
	$perfil = 1;

	include '../includes/database.php';

	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

	$sql = "SELECT * FROM Usuario WHERE Email = '$email' AND senha = '$senha'";

	$result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		
		setcookie('UsuarioID', base64_encode($row['UsuarioID']),0,"/");
		setcookie('Email', $email,0,"/");
		
		$perfil = $row['Perfil'];
		
		if ($perfil == 1)
			header("Location: ../../aluno.php");
		else
			header("Location: ../../professor.php");
	}else{
		$sql = "INSERT INTO Usuario(Email,Senha,Perfil) VALUES('$email','$senha',$perfil)";

		if (mysqli_query($con, $sql)) {
			$usuario_id = mysqli_insert_id($con);
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		
		setcookie('UsuarioID', base64_encode($usuario_id),0,"/");
		
		if ($perfil == 1)
			header("Location: ../../aluno.php");
		else
			header("Location: ../../professor.php");
	}

	die();
	mysqli_close($con);
}
?>