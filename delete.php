<?php
 
require_once 'connect.php';
 
// pega o ID da URL
$id_curso = isset($_GET['id_curso']) ? $_GET['id_curso'] : null;
 
// valida o ID
if (empty($id_curso))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM cursos WHERE id_curso = :id_curso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: consulta.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}