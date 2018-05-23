<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Unisearch|Cadastro Curso</title>
	<link rel="stylesheet" type="text/css" href="css/estilologinerro.css"/>
</head>
<body>
<?php
require_once 'connect.php';
// pega os dados do formuário
$curso = isset($_POST['curso']) ? $_POST['curso'] : null;
$periodo = isset($_POST['periodo']) ? $_POST['periodo'] : null;
$semestre = isset($_POST['semestre']) ? $_POST['semestre'] : null;
$turma = isset($_POST['turma']) ? $_POST['turma'] : null;
$bloco = isset($_POST['bloco']) ? $_POST['bloco'] : null;
$andar = isset($_POST['andar']) ? $_POST['andar'] : null;
$sala = isset($_POST['sala']) ? $_POST['sala'] : null;
// validação (bem simples, só pra evitar dados vazios)
if (empty($curso) || empty($periodo) || empty($semestre) || empty($turma) || empty($bloco) || empty($andar) || empty($sala))
{
    echo "Volte e preencha todos os campos";
    echo "<br> Aguarde 5 segundos...";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=cadastrocursos.php'>";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO cursos(curso, periodo, semestre, turma, bloco, andar, sala) VALUES(:curso, :periodo, :semestre, :turma, :bloco, :andar, :sala)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':curso', $curso);
$stmt->bindParam(':periodo', $periodo);
$stmt->bindParam(':semestre', $semestre); 
$stmt->bindParam(':turma', $turma); 
$stmt->bindParam(':bloco', $bloco);
$stmt->bindParam(':andar', $andar);
$stmt->bindParam(':sala', $sala);
if ($stmt->execute())
{
    header('Location: consulta.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>