<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Unisearch|Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilologinerro.css"/>
</head>
<body>

</body>
</html>
<?php 
// Inclui o arquivo de inicialização
require 'connect.php';
 
// Resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
 
if (empty($email) || empty($password)){
    echo "Erro: Informe email e senha <br>";
	echo "<br> Aguarde 5 segundos...";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=form-login.php'>";
    exit;
}
 
//Cria o hash da senha
$passwordHash = make_hash($password);
 
$PDO = db_connect();
 
$sql = "SELECT id, name FROM users WHERE email = :email AND password = :password";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordHash);
$stmt->bindParam(':password', md5($password));
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "Erro: Email ou senha incorretos <br>";
	echo "<br> Aguarde 5 segundos...";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=form-login.php'>";
    exit;
}
 
// Pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
 
header('Location: indexx.php');
?>