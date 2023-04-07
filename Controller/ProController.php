<?php
require_once("../Database/Conexao.php");
require_once("../Dao/UserDao.php");
require_once("../Model/Profissional.php");
require_once("../Dao/AtendDao.php");
require_once("../Model/Atendimento.php");

$pro = new Profissional();
$prodao = new ClienteDao();

$ag = new Atendimento();
$agdao = new AtendimentoDao();


$dados = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    $pro->setNome($dados['nome']);
    $pro->setIdade($dados['idade']);
    $pro->setCPF($dados['cpf']);
    $pro->setTelefone($dados['telefone']);
    $pro->setEmail($dados['mail']);
    $pro->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT)); 
    $pro->setSexo($dados['sexo']);
    $pro->setCargo($dados['cargo']);
    $pro->setFoto($_FILES['img']);
 


    if($prodao->CadastrarProfissional($pro)) {
//  alert('Cadastrado');
    echo "<script>
            alert('Cadastrado');
            location.href = '../index.html';
          </script>";
    }

}else if(isset($_POST['pedidos'])){
  
}
?>