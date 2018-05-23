<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Unisearch|Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilologinerro.css"/>
</head>
<body>
<?php
require_once 'connect.php';
// Pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$numcel = isset($_POST['numcel']) ? $_POST['numcel'] : null;
$senha = isset($_POST['senha']) ? hash('md5',$_POST['senha']) : null;
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($email) || empty($senha) || empty($numcel))
{
    echo "Favor: Preencha todos os campos<br>";
	echo "<br> Aguarde 5 segundos...";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=form-login.php'>";
    exit;
}
// Insere no banco
$PDO = db_connect();
$sql = "INSERT INTO users(name, email, numcel, password) VALUES(:nome, :email, :numcel, :senha)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':numcel', $numcel);
$stmt->bindParam(':senha', $senha);
if ($stmt->execute())
{
	echo "Cadastro realizado com sucesso<br>";
	echo "<br> Aguarde 5 segundos...";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=form-login.php'>";
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=form-login.php'>";
}
?>