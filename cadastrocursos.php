<?php
	session_start();
	require 'connect.php';
	require 'check.php';
?>
<html>
<head>
	<title>Unisearch|Cadastro de Cursos</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="css/estilopagweb.css"/>
</head>
<body> 
	<?php if (isLoggedIn()): ?>
            <p class="pp"><?php echo $_SESSION['user_name'];?>, Você está na página de cadastro de cursos|<a class="btnsair" onclick="return confirm('Tem certeza de que deseja sair?');" href="logout.php">Sair</a></p>
    <?php endif; ?>
	<form name="entrar" method="post" action="addinfo.php">
		<div class="logop"> <!-- divisão para logo do app -->
			<img class="logo" src="img/unisearchlogo.png" >
		</div>
		<div class="back">
			<a href="http://localhost/CadastroCurso/indexx.php"><img class="backimg" src="img/voltar.png"></a> 
		</div>
		<h2>Dados do Curso</h2></br>
		<h4>Cursos</h4>
		<select name="curso" id="curso">
			<option hidden selected>Selecione o Curso</option>
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
		<select name="periodo" id="periodo">
			<option hidden selected>Selecione o periodo</option>
			<option>Manha</option>
			<option>Noite</option>
		</select></br>
		<h4>Semestres</h4>
		<select name="semestre" id="semestre">
			<option hidden selected>Selecione o semestre</option>
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
		<input type="text" name="turma" id="turma" placeholder="Digite o Cod. da turma"/></br>		
		<h4>Blocos</h4>
		<select name="bloco" id="bloco">
			<option hidden selected>Selecione o Bloco</option>
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
		<select name="andar" id="andar">
			<option hidden selected>Selecione o andar</option>
			<option>1 Subsolo</option>
			<option>2 Subsolo</option>
			<option>Terreo</option>
			<option>Primeiro</option>
			<option>Segundo</option>
		</select></br>
		<h4>Salas</h4>
		<input type="text" name="sala" id="sala" placeholder="Digite o Cod. da sala"/></br>
		<input class="button" type="submit" value="Cadastrar Curso"/>
		<a href="consulta.php"><strong>CONSULTA DE CURSOS</strong></a>
   </form>
</body>
</html>