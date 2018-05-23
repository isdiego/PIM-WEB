<?php
	session_start();
	require_once 'connect.php';
	require 'check.php';
// pega o ID da URL
$id_curso = isset($_GET['id_curso']) ? (int) $_GET['id_curso'] : null;
// valida o ID
if (empty($id_curso))
{
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT curso, periodo, semestre, turma, bloco, andar, sala FROM cursos WHERE id_curso = :id_curso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
$stmt->execute();
$courses = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($courses))
{
    echo "Nenhum curso encontrado";
    exit;
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estiloedit.css"/> 
	<title>Unisearch|Editor de dados</title>
</head>
<body>
	<?php if (isLoggedIn()): ?>
            <p class="pp"><?php echo $_SESSION['user_name']; ?>, Você está na página de edição de dados do curso|<a class="ppa" onclick="return confirm('Tem certeza de que deseja sair?');" href="logout.php">Sair</a></p>
    <?php endif; ?>
	<form action="edit.php" method="post">
		<div class="logop"> <!-- divisão para logo do app -->
			<img class="logo" src="img/unisearchlogo.png" >
		</div>
		<div class="back">
			<a href="http://localhost/CadastroCurso/consulta.php"><img class="backimg" src="img/voltar.png"></a> 
		</div>
		<h2>Editar dados do Curso</h2></br>
		<h4>Cursos</h4>
		<select name="curso" id="curso" value="">
			<option hidden selected><?php echo $courses['curso'] ?></option>
			<option disabled>::|Cursos Superiores Tradicionais|::</option>
			<option>Administracao</option>
			<option>Adm de Empresas</option>
			<option>Arquitetura e Urbanismo</option>
			<option>Biomedicina</option>
			<option>Ciencias Biologicas</option>
			<option>Ciencia da Computacao</option>
			<option>Ciencias Contabeis</option>
			<option>Com.Social(Prop.e Public. e Jornalismo)</option>
			<option>Direito</option>
			<option>Educacao Fisica</option>
			<option>Enfermagem</option>
			<option>Engenharia Basica</option>
			<option>Engenharias</option>
			<option>Estetica e Cosmetica</option>
			<option>Farmacia</option>
			<option>Fisioterapia</option>
			<option>Letras</option>
			<option>Matematica</option>
			<option>Nutricao</option>
			<option>Pedagogia</option>
			<option>Psicologia</option>
			<option>Radiologia Medica</option>
			<option>Serviço Social</option>
			<option>Fotografia e Design Grafico</option>
			<option disabled>::|Cursos Superiores Tecnológicos|::</option>
			<option>Analise e Desenvolvimento de Sistemas</option>
			<option>Automacao Industrial</option>
			<option>Gestao Qualidade</option>
			<option>Gestao Financeiro</option>
			<option>Logistica</option>
			<option>Processos</option>
			<option>Gestao Recursos Humanos</option>
			<option>Tecnologia da Informacao</option>
			<option>Processos Gerenciais</option>
		</select></br>
		<h4>Períodos</h4>
		<select name="periodo" id="periodo" value="">
			<option hidden selected><?php echo $courses['periodo'] ?></option>
			<option>Manha</option>
			<option>Noite</option>
		</select></br>
		<h4>Semestres</h4>
		<select name="semestre" id="semestre" value="">
			<option hidden selected><?php echo $courses['semestre'] ?></option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select></br>
		<h4>Turmas</h4>
			<input type="text" name="turma" id="turma" placeholder="Digite o Cod. da turma" value="<?php echo $courses['turma'] ?>"/></br>		
		<h4>Blocos</h4>
		<select name="bloco" id="bloco" value="">
			<option hidden selected><?php echo $courses['bloco'] ?></option>
			<option>A</option>
			<option>B</option>
			<option>C</option>
			<option>D</option>
			<option>E</option>
			<option>F</option>
			<option>G</option>
			<option>H</option>
		</select></br>
		<h4>Andares</h4>
		<select name="andar" id="andar" value="">
			<option hidden selected><?php echo $courses['andar'] ?></option>
			<option>1 Subsolo</option>
			<option>2 Subsolo</option>
			<option>Terreo</option>
			<option>Primeiro</option>
			<option>Segundo</option>
		</select></br>
		<h4>Salas</h4>
			<input type="text" name="sala" id="sala" placeholder="Digite o Cod. da sala" value="<?php echo $courses['sala'] ?>"/></br>
		<input type="hidden" name="id_curso" value="<?php echo $id_curso ?>">	
		<input class="button" type="submit" value="Alterar">
	</form>
</body>
</html>