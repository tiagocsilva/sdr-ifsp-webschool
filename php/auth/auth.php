<?php
if (isset($_POST["submit"])) {
	$email = $_POST["Email"];
	$senha = md5($_POST["Senha"]);
	$perfil = $_POST["Perfil"];

	include '../includes/database.php';

	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

	$sql = "SELECT * FROM Usuario WHERE Email = '$email' AND senha = '$senha' AND perfil = $perfil";

	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		   
		setcookie('UsuarioID', base64_encode($row['UsuarioID']),(time() + (3 * 24 * 3600)));

	   	header("Location: ../../dashboard.php");
	}else{
		$sql = "INSERT INTO Usuario(Email,Senha,Perfil) VALUES('$email','$senha',$perfil)";

		if (mysqli_query($con, $sql)) {
			$usuario_id = mysqli_insert_id($con);
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		
		setcookie('UsuarioID', base64_encode($usuario_id),(time() + (3 * 24 * 3600)));
		header("Location: ../../dashboard.php");
	}
	
	die();
	mysqli_close($con);
}

function generateRandomString($length = 10) {
	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>