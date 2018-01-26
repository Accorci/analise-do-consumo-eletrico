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
	$sql         = "SELECT * FROM geladeira";
	$sql         = mysqli_query($conexao, $sql);
	//Cria o array primário
	$dados       = array();
	//Laço dos dados
	$temp_hora   = array();
	$temp_hora[] = ((string) "tempo");
	$temp_hora[] = ((string) "potencia");
	$temp_hora[] = ((string) "reais");
	$dados[]     = ($temp_hora);
	while ($linha = mysqli_fetch_assoc($sql)) {
	    //Cria o array secundário, onde estarão os dados.
	    $temp_hora   = array();
	    $temp_hora[] = ((string) $linha['Horário']);
	    $temp_hora[] = ((float) $linha['watts']);
	    $temp_hora[] = ((float) $linha['reais']);
	    //Recebe no array principal, os dados.
	    $dados[]     = ($temp_hora);
	} //$linha = mysql_fetch_assoc($sql)
	//Trasforma os dados em JSON
	$jsonTable = json_encode($dados);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Smart House</title>
        <link rel="stylesheet" href="_css/style.css"/>
        <link rel="stylesheet" href="_css/fonte.css"/>
        <link rel="stylesheet" href="_css/ionicons.min.css"/>
        <script src="js.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                $('#nav-menu').click(function(){
                    $('ul.nav-list').addClass('open');
                    $('ul.nav-list').slideToggle('200');
                });
            });
        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php
echo $jsonTable;
?>);
        var options = {
          title: 'Consumo em Watts',
          curveType: 'function',
          legend: { position: 'bottom' }
          
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    </head>
    <body>
    
        <div id="interface" class="container">
            <header id="cabecalho">
                <nav class="nav-bar">
                    <div class="nav-container">
                        <a id="nav-menu" class="nav-menu">&#9776; Menu</a>
                        <ul class="nav-list " id="nav">
                            <li> <a href="historico.html" id="tile2"><i class="icon ion-ios7-person-outline" ></i> Histórico</a></li>
                            <li> <a href="instantaneo.html" id="tile3"><i class="icon ion-ios7-briefcase-outline"></i> Instantâneo</a></li>
                            <li> <a href="renomear.html" id="tile4"><i class="ion-ios7-monitor-outline"></i> Renomear</a></li>
                            <li> <a href="simulacao.html" id="tile5"><i class="ion-ios7-people-outline"></i> Simulação</a></li>
                            <li> <a href="despertador.html" id="tile6"><i class="ion-bag"></i> Despertador</a></li>
                            <li> <a href="onoff.html" id="tile7"><i class="ion-bag"></i> On/Off</a></li>
                            <li> <a href="sobre.html" id="tile8"><i class="ion-ios7-email-outline"></i> Sobre</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="page-header">
                <h1 align="center">Consumo diário da geladeira</h1>
            </div>
            <div class="container" style="height: 300px; width: 100%" id="curve_chart"></div>
        </div>
    </body>
</html>