<?php
	session_start();
	require_once 'connect.php';
	require 'check.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
// Veja o Exemplo 2 deste link: http://php.net/manual/pt_BR/pdostatement.rowcount.php
$sql_count = "SELECT COUNT(DISTINCT curso) AS total FROM cursos ORDER BY curso ASC";
// SQL para selecionar os registros
$sql = "SELECT * FROM cursos ORDER BY curso ASC";
// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estiloconsulta.css"/> 
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
	<script type="text/javascript" src="js/script.js"></script>
	<title>Unisearch|Consulta</title>
</head>
<body>
	<?php if (isLoggedIn()): ?>
            <p class="pcons" ><?php echo $_SESSION['user_name']; ?>, Você está na página de consulta de cursos|<a onclick="return confirm('Tem certeza de que deseja sair?');" href="logout.php">Sair</a></p>
    <?php endif; ?>
	<div class="logop"> <!-- divisão para logo do app -->
		<img class="logo" src="img/unisearchlogo.png" >
	</div>
	<h1>CONSULTA</h1>
	<h2>Lista de Cursos Cadastrados</h2>
    <p>Total de Cursos: <?php echo $total ?></p>
		<?php if ($total > 0): ?>
	<table id="tabela">
		<thead>
				<tr>
					<th>Digite um Curso</th>
					<th>Digite um Periodo</th>
					<th>Digite um Semestre</th>
					<th>Digite um Turma</th>
					<th>Digite um Bloco</th>
					<th>Digite um Andar</th>
					<th>Digite um Sala</th>
				</tr>
				<tr>
					<th><input placeholder="Digite um curso" type="text" id="txtColuna1"/></th>
					<th><input placeholder="Digite um periodo" type="text" id="txtColuna2"/></th>
					<th><input placeholder="Digite um semestre" type="text" id="txtColuna3"/></th>
					<th><input placeholder="Digite um turma" type="text" id="txtColuna4"/></th>
					<th><input placeholder="Digite um bloco" type="text" id="txtColuna5"/></th>
					<th><input placeholder="Digite um andar" type="text" id="txtColuna6"/></th>
					<th><input placeholder="Digite um sala" type="text" id="txtColuna7"/></th>
				</tr>				
			</thead>
		
		<thead>
			<tr>
				<th>Curso</th>
				<th>Periodo</th>
				<th>Semestre</th>
				<th>Turma</th>
				<th>Bloco</th>
				<th>Andar</th>
				<th>Sala</th>
				<th>Ações</th>
			</tr>
		</thead> 
		<div class="back">
			<a href="http://localhost/CadastroCurso/indexx.php"><img class="backimg" src="img/voltar.png"></a> 
		</div>
		<tbody>
			<?php while ($courses = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
			<tr>
				<td><?php echo $courses['curso'] ?></td>
				<td><?php echo $courses['periodo'] ?></td>
				<td><?php echo $courses['semestre'] ?></td>
				<td><?php echo $courses['turma'] ?></td>
				<td><?php echo $courses['bloco'] ?></td>
				<td><?php echo $courses['andar'] ?></td>
				<td><?php echo $courses['sala'] ?></td>
					<td>
						<a href="form-edit.php?id_curso=<?php echo $courses['id_curso'] ?>">Editar</a>
						<a href="delete.php?id_curso=<?php echo $courses['id_curso'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
					</td>
			</tr>
				<?php endwhile; ?>
		</tbody>
	</table>
		<?php else: ?>
	<p>Nenhum curso registrado</p>
		<?php endif; ?>
</body>
</html>