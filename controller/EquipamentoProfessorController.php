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
        //if ($result >= 1) {
        // echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cad_cadastro.php'</script>";
        //} else {
        //echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        //}
        
        echo  "<link href='.assets/css/demo.css.' rel='.stylesheet.'/>";
        echo  "<button onclick='.demo.showNotification('top','left').' >Top Left</button>";
      

        //echo "<script>alert('Equipamento Reservado Com Sucesso!');document.location='../view/FormularioCoordenador/formReservaEquipamento.php'</script>";






      }      



       
    

}

new EquipamentoProfessorController();
?>
