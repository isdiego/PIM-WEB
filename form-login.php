<?php
	session_start(); 
	require 'connect.php';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Unisearch|Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilologin.css"/>
</head>
<body>
	<div class="logop"> <!-- divisão para logo do app -->
		<img class="logo" src="img/unisearchlogo.png" >
	</div>		
		<?php if (isLoggedIn()): ?>
            <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="indexx.php">Página Principal</a> | <a onclick="return confirm('Tem certeza de que deseja trocar de usuário?');" href="logout.php">Trocar de Usuário</a></p>
        <?php else: ?>
            <p>Olá, visitante.</p>
        <?php endif; ?>
<div>
    <form class="formlogin" action="login.php" method="post" <?php if (isLoggedIn()){?> hidden <?php }?>>
		<h1 <?php if (isLoggedIn()){?> hidden <?php }?>> Login</h1>
        <label for="email">Email: </label> <br>
        <input type="text" name="email" id="email"> <br> 
        <label for="password">Senha: </label> <br>
        <input type="password" name="password" id="password"> <br><br>
        <input class="inpentra" type="submit" value="Entrar">
    </form>
</div>
<div class="formcad">	
	<form method="post"  enctype="multipart/form-data" action="addusuario.php" <?php if (isLoggedIn()){?> hidden <?php }?>>
		<h1 <?php if (isLoggedIn()){?> hidden <?php }?>>Cadastro</h1>	
		<label>Nome:</label> <br>
		<input type="text" name="nome"/> <br>
		<label>Email:</label> <br>
		<input type="email" name="email"/> <br>
		<label>Tel/Cel:</label> <br>		
		<input type="number_format" name="numcel"/> <br>
		<label>Senha:</label> <br>		
		<input type="password" name="senha"/><br><br>
		<input class="inpcad" type="submit" value="Cadastrar Usuário"/>
    </form>
</div>
</body>
</html>