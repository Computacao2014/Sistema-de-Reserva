
<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "BANCORESERVA";

     $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());


    function buscaReserva($conexao){

    $query = "select codLab, dataEmp from LAB_PROF where codProf = '".$_POST['matricula']."'";
    $resultado = mysqli_query($conexao, $query);
    $reserva = array();

	    while ($atual = mysqli_fetch_assoc($resultado)) {
	   		  array_push($reserva,$atual);
	    }

	    return $reserva;
	}

	function buscaLaboratorio($conexao, $codigoLaboratorio){

    $query = "select codLab , nome from LABORATORIO where codLab = '".$codigoLaboratorio."'";
    $resultado = mysqli_query($conexao, $query);
    $laboratorio = array();

	    while ($atual = mysqli_fetch_assoc($resultado)) {
	   		  array_push($laboratorio,$atual);
	    }

	    return $laboratorio;
	}
	 
	 
    $reserva = buscaReserva($conexao);
    $json= array();

	$tabela = '<table class="table">';//abre table
    $tabela .='<thead>';//abre cabeçalho
    $tabela .= '<tr>';//abre uma linha
    $tabela .= '<th>Código</th>';
    $tabela .= '<th>Codigo Laboratorio</th>'; // colunas do cabeçalho
    $tabela .= '<th>Data de Emprestimo</th>';

    $tabela .= '</tr>';//fecha linha
    $tabela .='</thead>'; //fecha cabeçalho
    $tabela .='<tbody>';//abre corpo da tabela*/
    foreach ($reserva as $reser) : 
    $tabela .= '<tr>'; // abre uma linha
	    
	    $laboratorio = buscaLaboratorio($conexao, $reser['codLab']);	
		foreach ($laboratorio as $labora) :
		//$json += json_encode($labora);
		array_push($json,$labora);	 
		$tabela .= '<td>'.$labora['codLab'].'</td>';	
   		$tabela .= '<td>'.$labora['nome'].'</td>'; //coluna numero
       
   		endforeach;		
   		$retorno = json_encode($json);

    $tabela .= '<td>'.$reser['dataEmp'].'</td>'; // coluna validade
    $tabela .= '</tr>';
    // echo "Resposta: ".$reser['codLab'] . " " . $reser['dataEmp']; 
    endforeach;		
    echo $tabela; 
  // 	echo $retorno;





/*$name = $_POST['matricula'];
echo "Resposta: " . $name;*/



?>