<?php
require_once 'connect.php';
// resgata os valores do formulário
$curso = isset($_POST['curso']) ? $_POST['curso'] : null;
$periodo = isset($_POST['periodo']) ? $_POST['periodo'] : null;
$semestre = isset($_POST['semestre']) ? $_POST['semestre'] : null;
$turma = isset($_POST['turma']) ? $_POST['turma'] : null;
$bloco = isset($_POST['bloco']) ? $_POST['bloco'] : null;
$andar = isset($_POST['andar']) ? $_POST['andar'] : null;
$sala = isset($_POST['sala']) ? $_POST['sala'] : null;
$id_curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : null;
// validação (bem simples, mais uma vez)
if (empty($curso) || empty($periodo) || empty($semestre) || empty($turma) || empty($bloco) || empty($andar) || empty($sala))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE cursos SET curso = :curso, periodo = :periodo, semestre = :semestre, turma = :turma, bloco = :bloco, andar = :andar, sala = :sala WHERE id_curso = :id_curso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':curso', $curso);
$stmt->bindParam(':periodo', $periodo);
$stmt->bindParam(':semestre', $semestre);
$stmt->bindParam(':turma', $turma);
$stmt->bindParam(':bloco', $bloco);
$stmt->bindParam(':andar', $andar);
$stmt->bindParam(':sala', $sala);
$stmt->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: consulta.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>