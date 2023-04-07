<?php
session_start();

require_once("../Database/Conexao.php");

require_once("../Dao/AtendDao.php");
require_once("../Model/Atendimento.php");
require_once("../Model/Avalia.php");

$atendimento = new Atendimento();
$atendimentodao = new AtendimentoDao();

$avalia = new Avalia();


$dados = filter_input_array(INPUT_POST);
// 'd' = agendar e pega a variavel do id_profissional
if(isset($_POST['d'])){
    
    $atendimento->setDesc($dados['desc']);
    $atendimento->setID_profissional($dados['d']);
    $atendimento->setStatus('Pendente');
    
    if($dados['tipo'] == 1){
        
        $atendimento->setObs('Controle de medicamentos');

    }else if($dados['tipo'] == 2){
        
        $atendimento->setObs('Acompanhamento em consultas médicas');

    }else if($dados['tipo'] == 3){

        $atendimento->setObs('Higiene e/ou alimentação');

    }else if($dados['tipo'] == 4){

        $atendimento->setObs('Cuidados com idosos acamados');
    }

    
    if($dados['turno'] == 1){
        
        $atendimento->setTurno('Manhã, das 6h ás 12h');

    }else if($dados['turno'] == 2){
        
        $atendimento->setTurno('Tarde, das 12h ás 18h');

    }else if($dados['turno'] == 3){

        $atendimento->setTurno('Noite, das 18h ás 24h');

    }else if($dados['turno'] == 4){

        $atendimento->setTurno('Madrugada, das 0h as 6h');
    }
    
 
   
    if($atendimentodao->Agendamento($atendimento)) {
   
        echo "<script>
        alert('Agendamento concluido, verifique as solicitações!');
        location.href = '../Views/Paciente/Menu.php';
    </script>";
    }else{
        echo "e";
    }


}else if(isset($_POST['cancelar'])){
 

    $atendimento->setID($dados['id_b']);
    if($atendimentodao->Cancelar($atendimento)) {
        $atendimentodao->BuscaCancel($atendimento);
        //    alert('Agendamento Cancelado!!');
        echo "<script>
            
                location.href = '../Views/Paciente/Menu.php';
            </script>";
          
        }

        
}else if(isset($_POST['confirmar'])){
    $atendimento->setStatus('Confirmado');
    $atendimento->setID($dados['id_aa']);
    
    if($atendimentodao->Confirmacao($atendimento)){
     
        echo "<script>
            alert('Agendamento do paciente foi confirmado!!');
                location.href = '../Views/Funcionario/funcionario.html';
            </script>";
    }
}else if(isset($_POST['nota'])){
    
  

    if($dados['estrela'] == 1){
        
        $avalia->setAvaliacao(1);

    }else if($dados['estrela'] == 2){
        
        $avalia->setAvaliacao(2);

    }else if($dados['estrela'] == 3){

        $avalia->setAvaliacao(3);

    }else if($dados['estrela'] == 4){

        $avalia->setAvaliacao(4);

    }else if($dados['estrela'] == 5){

        $avalia->setAvaliacao(5);
    }
    $avalia->setStatus_a('Avaliado');
   
   $avalia->setID_profissional($dados['id_e']);

    if($atendimentodao->Avaliacao($avalia)) {
        if($atendimentodao->Media($avalia)){
            if($atendimentodao->Guardamedia($avalia)){
                if($atendimentodao->UpStatus($avalia)){
                    echo "<script>
                    alert('Avaliado!!');
                    location.href = '../Views/Paciente/Menu.php';
                    </script>";
                }
                
            }
        }
        
    }else{
        echo "<script> alert('erro'); </script>";
    }

}
?>