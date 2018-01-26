<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Smart House</title>
        <link rel="stylesheet" href="_css/style.css"/>
        <link href="bootstrap.min.css" rel="stylesheet">
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
            <div class="container" id="form" >
                <br><br><br><br><br><br><br>
                <form class="form-horizontal" action="valor_simulacao.php" method="POST" >
                    <div class="form-group" align="center">
                        <label  class="col-sm-5 control-label">Potência em watts:</label>
                        <div class="col-sm-4">
                            <input class="form-control" required="required" 
                                placeholder="Digite aqui potência do aparelho" type="text" name="valor1"/>
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <label  class="col-sm-5 control-label">Horas ao dia:</label>
                        <div class="col-sm-4">
                            <input class="form-control" required="required" 
                                placeholder="horas por dia que o dispositivo ficará ligado" type="text" name="valor2"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-5 control-label">Quantidade de dias:</label>
                        <div class="col-sm-4">
                            <input class="form-control" required="required" 
                                placeholder="dias por mês que o dispositivo será ligado" type="text" name="valor3"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-7">
                            <input class="btn btn-success" type="submit" value="Calcular" />  
                        </div>
                    </div>
                </form>

                <?php
				$v1=$_POST['valor1'];
				$v2=$_POST['valor2'];
				$v3=$_POST['valor3'];
				$total=(($v1*$v2*$v3)/1000);
				?>
				<br><br><br>
				<div class="form-group">
                        <label  class="col-sm-5 control-label"></label>
                        <div class="col-sm-4">
                            <?php echo"Seu consumo em reais será: $total R$"; ?>
                        </div>
                    </div>
				
            </div>
            <footer id="rodape">
            </footer>
        </div>
    </body>
</html>
