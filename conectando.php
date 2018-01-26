<?php
	$host = "localhost";
	$usuario = "id1608029_pedroacorsi";
	$senha = "1234567890";
	$bd = "id1608029_smarthouse";
	//cria a conexao mysqli_connect('localizacao BD', 'usuario de acesso', 'senha', 'banco de dados')
	$conexao = mysqli_connect($host, $usuario, $senha, $bd);
	
	//ajusta o charset de comunicação entre a aplicação e o banco de dados
	mysqli_set_charset($conexao, 'utf8');

	//verifica a conexão
	if ($conexao->connect_errno) {
		die ("Falha ao realizar a conexão: " . $conexao->connect_errno);
	}
?>
