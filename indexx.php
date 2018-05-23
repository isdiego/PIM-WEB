<?php
	session_start();
	require_once 'connect.php';
	require 'check.php';
?>
<html>
<head>
	<title>Unisearch|Cadastro e Consulta</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body> 
	<?php if (isLoggedIn()): ?>
	<p>Bem-vindo à página de cadastro e consulta, <?php echo $_SESSION['user_name']; ?> | <a onclick="return confirm('Tem certeza de que deseja sair?');" href="logout.php">Sair</a></p>
    <?php endif; ?>
	<div class="logop"> <!-- divisão para logo do app -->
		<img class="logo" src="img/unisearchlogo.png" >
	</div>
	<div class="ientra"> <!-- divisão para btn consulta -->
		<a href="cadastrocursos.php"><img class="ientraimg" src="img/entra.png"></a>
	</div>
	<div class="iconsulta"> <!-- divisão para btn consulta -->
		<a href="http://localhost/CadastroCurso/consulta.php"><img class="iconsultaimg" src="img/consulta.png"></a>
	</div>
</body>
</html>