<?php
$DataEmp = $_POST['data'];
$HoraEmp = $_POST['hora'];

require_once("../model/EquipamentoProfessor.php");

class EquipamentoProfessorController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new EquipamentoProfessor();

        //$acao = $_POST['acao'];
        //if ($acao == "incluir") {
        $this->incluirEq();
        //}
    }

    private function incluirEq() {
        //$this->cadastro->setCod($_POST['matricula']);
        
        $this->cadastro->setCodEquip($_POST['CodEquipamento']);
        $this->cadastro->setCodProf($_POST['professor']);
        $this->cadastro->setDataEmp($_POST['data']);
        $this->cadastro->setHoraEmp($_POST['hora']);
        $this->cadastro->setStatus($_POST['status']);


        $result = $this->cadastro->incluirEquipProf();
     
        

        header("Location: ../view/FormularioCoordenador/formEquipamentoDisponivel.php", TRUE, 307);
      

        //echo "<script>alert('Equipamento Reservado Com Sucesso!');document.location='../view/FormularioCoordenador/formReservaEquipamento.php'</script>";

    }      

}

new EquipamentoProfessorController();
?>
