<!doctype html>
<?php include 'conn.php'; ?>

<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['Matricula'])) {
// Destrói a sessão por segurança
    session_destroy();
// Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../pagina1.php'</script>";
    exit;
}
?>

<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Solicitação de Reserva</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>


        <div class="wrapper">
            <div class="sidebar" data-color="azure" data-image="../imagens/logo.png">
                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


                <div class="sidebar-wrapper">

                    <div class="logo">
                        <a href="http://www.uespi.br/site" target="_blank" class="simple-text">
                            Site Da Instituição
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="formProfessorInicio.php">
                                <i class="pe-7s-graph"></i>
                                <p>Inicio</p>
                            </a>
                        </li>


                        <li>
                            <a href="formReservaEquipamento.php">
                                <i class="pe-7s-video"></i>
                                <p>Reservar Equipamentos</p>
                            </a>
                        </li>

                        <li>
                            <a href="formReservaLaboratorio.php">
                                <i class="pe-7s-culture"></i>
                                <p>Reservar Laboratório</p>
                            </a>
                        </li>
                        <li>
                            <a href="formHistoricoEquipamento.php">
                                <i class="pe-7s-note2"></i>
                                <p>Histórico de Reserva</p>
                            </a>
                        </li>

                        <li class="active-pro">
                            <a href="http://www.uespi.br/site/" target="_blank" class="simple-text">
                                <i class="pe-7s-rocket"></i>
                                <p>Site Da Instituição</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>

                                </li>
                                <li class="dropdown">

                                </li>
                                <li>

                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>

                                    <a href="formEditarProfessor.php">
                                        <?php echo "" . $_SESSION['Nome']; ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="formEditarProfessor.php">
                                        Conta
                                    </a>
                                </li>
                                <li class="dropdown">

                                    <a href="../../pagina1.php">
                                        Sair
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">HISTÓRICO DE EQUIPAMENTOS</h4>


                                    </div>
                                    <div class="content">
                                        <form class="form-signin" id="formulario" action= "../../controller/EquipamentoProfessorController.php" method="post">
                                            <?php
                                            $host = "localhost";
                                            $user = "root";
                                            $pass = "";
                                            $banco = "BANCORESERVA";

                                            $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());
                                            ?>


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Professor</th>
                                                        <th>Equipamento</th>
                                                        <th>Modelo</th>
                                                        <th>Marca</th>
                                                        <th>Hora de Reserva</th>
                                                        <th>Data de Reserva</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>
                                                        <?php
                                                        error_reporting(E_ERROR | E_PARSE);
                                                        $coordenacaoP = $_SESSION['Codigo'];
                                                        $data = date('Y-m-d');


                                                        $query = "SELECT  PROFESSOR.codProf, PROFESSOR.nomeProf , EQUIP_PROF.horaEmp, EQUIPAMENTO.nomeEquip, EQUIPAMENTO.modelo, EQUIPAMENTO.marca,  EQUIP_PROF.dataEmp
                                                            FROM EQUIP_PROF 
                                                            INNER JOIN PROFESSOR ON EQUIP_PROF.codProf = PROFESSOR.codProf
                                                            INNER JOIN EQUIPAMENTO ON EQUIP_PROF.codEquip = EQUIPAMENTO.codEquip WHERE EQUIP_PROF.dataEmp = '".$data."'";


                                                        $resultado = mysqli_query($conexao, $query);


                                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                                            error_reporting(E_ERROR | E_PARSE);


                                                            echo '<td>' . $row['nomeProf'] . '</td>';
                                                            echo '<td>' . $row['nomeEquip'] . '</td>';
                                                            echo '<td>' . $row['modelo'] . '</td>';
                                                            echo '<td>' . $row['marca'] . '</td>';
                                                            switch ($row['horaEmp']) {
                                                                case 1:
                                                                    echo '<td>08:00h às 10:00h</td>';
                                                                    break;
                                                                case 2:
                                                                    echo '<td>10:00h às 12:00h</td>';
                                                                    break;
                                                                case 3:
                                                                    echo '<td>14:00h às 16:00h</td>';
                                                                    break;
                                                                case 4:
                                                                    echo '<td>16:00h às 18:00h</td>';
                                                                    break;
                                                                case 5:
                                                                    echo '<td>18:00h às 20:00h</td>';
                                                                    break;
                                                                case 6:
                                                                    echo '<td>20:00h às 22:00h</td>';
                                                                    break;
                                                            }
                                                            //echo '<td>' . $row['horaEmp'] . '</td>';
                                                            echo '<td>' . $row['dataEmp'] . '</td>';
                                                            echo '<td> <button value="1" name="CodEquipamento" type="submit" >Entregar</button> </td>';
                                                            echo '</tr> ';
                                                            echo '</tr>';
//echo '</tbody></table>';
                                                        }
                                                        ?>
                                                </tbody>
                                            </table>
                                            <br><br>

                                            <h4 class="title">HISTÓRICO DE LABORATÓRIO</h4>


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Professor</th>
                                                        <th>Laboratório</th>
                                                        <th>Hora de Reserva</th>
                                                        <th>Data de Reserva</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>
                                               <form class="form-signin" id="formulario" action= "../../controller/EntregaEquipamentoController.php" method="post">

                                        
                                                        <?php
                                                        $data = date('Y-m-d');
                                                        error_reporting(E_ERROR | E_PARSE);
                                                        $coordenacaoP = $_SESSION['Codigo'];


                                                        $query2 = "SELECT  PROFESSOR.codProf, PROFESSOR.nomeProf , LAB_PROF.horaEmp, LABORATORIO.nomeLab ,LAB_PROF.dataEmp 
                                                            FROM LAB_PROF
                                                            INNER JOIN PROFESSOR ON LAB_PROF.codProf = PROFESSOR.codProf
                                                            INNER JOIN LABORATORIO ON LAB_PROF.codLab = LABORATORIO.codLab
                                                            WHERE LAB_PROF.dataEmp ='".$data."' ";




                                                        $resultado2 = mysqli_query($conexao, $query2);


                                                        while ($row = mysqli_fetch_assoc($resultado2)) {
                                                            error_reporting(E_ERROR | E_PARSE);


                                                            echo '<td>' . $row['nomeProf'] . '</td>';
                                                            echo '<td>' . $row['nomeLab'] . '</td>';
                                        <input type="hidden" name="codProfessor" value="<?php echo $row['codProf']; ?>">
                                        <input type="hidden" name="codLaboratorio" value="<?php echo $row['codLab']; ?>">
                                        <input type="hidden" name="dataEmpretismo" value="<?php echo $row['dataEmp']; ?>">
                                        <input type="hidden" name="horaEmprestimo" value="<?php echo $row['horaEmp']; ?>">


                                                            switch ($row['horaEmp']) {
                                                                case 1:
                                                                    echo '<td>08:00h às 10:00h</td>';
                                                                    break;
                                                                case 2:
                                                                    echo '<td>10:00h às 12:00h</td>';
                                                                    break;
                                                                case 3:
                                                                    echo '<td>14:00h às 16:00h</td>';
                                                                    break;
                                                                case 4:
                                                                    echo '<td>16:00h às 18:00h</td>';
                                                                    break;
                                                                case 5:
                                                                    echo '<td>18:00h às 20:00h</td>';
                                                                    break;
                                                                case 6:
                                                                    echo '<td>20:00h às 22:00h</td>';
                                                                    break;
                                                            }
                                                            //echo '<td>' . $row['horaEmp'] . '</td>';
                                                            echo '<td>' . $row['dataEmp'] . '</td>';

                                                            echo '<td> <button value="" name="CodEquipamento" type="submit" >Entregar</button> </td>';
                                                            echo '</tr> ';
                                                            echo '</tr>';

//echo '</tbody></table>';
                                                        }
                                                        ?>
                                                        </form>
                                                </tbody>
                                            </table>




                                    </div>
                                </div>

                                </form><!-- /form -->
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

</body>

</html>


