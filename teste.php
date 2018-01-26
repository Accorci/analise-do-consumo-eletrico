<?php
  $host    = "localhost";
  $usuario = "id1608029_pedroacorsi";
  $senha   = "123456789";
  $bd      = "id1608029_smarthouse";
  //cria a conexao mysqli_connect('localizacao BD', 'usuario de acesso', 'senha', 'banco de dados')
  $conexao = mysqli_connect($host, $usuario, $senha, $bd);
  //ajusta o charset de comunicação entre a aplicação e o banco de dados
  mysqli_set_charset($conexao, 'utf8');
  //verifica a conexão
  if ($conexao->connect_errno) {
      die("Falha ao realizar a conexão: " . $conexao->connect_errno);
  } //$conexao->connect_errno
  //Faz o SELECT da tabela
  $sql         = "SELECT * FROM luz_quarto";
  $sql         = mysqli_query($conexao, $sql);
  //Cria o array primário
  $dados       = array();
  //Laço dos dados
  $temp_hora   = array();
  $temp_hora[] = ((string) "tempo");
  $temp_hora[] = ((string) "potencia");
  $dados[]     = ($temp_hora);
  $i=0;
  while ($linha = mysqli_fetch_assoc($sql)) {
      //Cria o array secundário, onde estarão os dados.
      $temp_hora   = array();
      $temp_hora[] = ((string) $linha['Horário']);
      $temp_hora[] = ((float) $linha['watt']);
      $i=$i+1;
      //Recebe no array principal, os dados.
      $dados[]     = ($temp_hora);
  } //$linha = mysql_fetch_assoc($sql)
  //Trasforma os dados em JSON
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Smart House</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="cabecalho" class="container" align="center">	
		<div class="page-header">
			<h1 align="center">Tomadas</h1>
		</div>k
		çççç
		<?php echo $i ?>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>ID_Usuario</th>
							<th>Nome da tomada</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						
							<tr>
								<td><?php echo $rows_cursos['id']; ?></td>
								<td><?php echo $rows_cursos['id_usuario']; ?></td>
								<td><?php echo $rows_cursos['nome_tomada']; ?></td>
								<td><?php echo $rows_cursos['status']; ?></td>
								<td>
									<button type="button" class="btn btn-xs btn-primary">Alterar</button>
									<button type="button" class="btn btn-xs btn-warning">Editar</button>
									<button type="button" class="btn btn-xs btn-danger">Apagar</button>
								</td>
							</tr>
						
					</tbody>
				</table>
			</div>
		</div>		
	</div>
	<br><br>	
	<nav id="menu">
		<ul type="disc">
			<li><a href="controle.html">Controle</a></li>
		</ul>
	</nav>

	</div>
</body>
</html>