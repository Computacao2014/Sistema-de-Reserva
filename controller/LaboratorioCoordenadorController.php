<?php

$DataEmp = $_POST['data'];
$HoraEmp = $_POST['hora'];

require_once("../model/LaboratorioProfessor.php");

class LaboratorioProfessorController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new LaboratorioProfessor();

        $this->incluirProf();
        
    }

    private function incluirProf() {
        
        $this->cadastro->setCodLab($_POST['CodLaboratorio']);
        $this->cadastro->setCodProf($_POST['professor']);
        $this->cadastro->setDataEmp($_POST['data']);
        $this->cadastro->setHoraEmp($_POST['hora']);
        $this->cadastro->setStatus($_POST['status']);

        $result = $this->cadastro->incluirLabProf();


             
        
        echo "<script>alert('Laboratório Reservado Com Sucesso!');document.location=''</script>";
        header("Location: ../view/FormularioCoordenador/formLaboratorioDisponivel.php", TRUE, 307);
    }

}

new LaboratorioProfessorController();
?>
