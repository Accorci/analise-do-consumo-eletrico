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
  while ($linha = mysqli_fetch_assoc($sql)) {
      //Cria o array secundário, onde estarão os dados.
      $temp_hora   = array();
      $temp_hora[] = ((string) $linha['Horário']);
      $temp_hora[] = ((float) $linha['watt']);
      //Recebe no array principal, os dados.
      $dados[]     = ($temp_hora);
  } //$linha = mysql_fetch_assoc($sql)
  //Trasforma os dados em JSON
  $jsonTable = json_encode($dados);
  echo $jsonTable;
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php
echo $jsonTable;
?>);





        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>