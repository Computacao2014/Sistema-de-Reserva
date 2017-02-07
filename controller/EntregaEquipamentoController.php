<?php

$codProf = $_POST['codProfessor'];
$codLab = $_POST['codLaboratorio'];
$dataEmp = $_POST['dataEmpretismo'];
$horaEmp = $_POST['horaEmprestimo'];



$pdo->query("UPDATE EQUIP_PROF SET satus = 2 WHERE codEquip ='".$codProf."'  and codProf = '".$codLab."' and dataEmp = '".$dataEmp."'horaEmp = '".$horaEmp."' ");
    echo "<script>alert('Equipamento Entregue com sucesso!');document.location='../view/FormularioProfessor/formProfessorInicio.php'</script>";
//} else {
  //  echo "<script>alert('Senhas não conferem');document.location='../view/FormularioProfessor/formEditarProfessor.php'</script>";
//}

?>
