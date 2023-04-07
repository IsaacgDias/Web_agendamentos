<?php
require_once("../Database/Conexao.php");
require_once("../Dao/UserDao.php");
require_once("../Model/Cliente.php");
require_once("../Model/Profissional.php");

$cliente = new Cliente();
$pro = new Profissional();

$clientedao = new ClienteDao();





$dados = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    $cliente->setNome($dados['nome']);
    $cliente->setIdade($dados['idade']);
    $cliente->setCPF($dados['cpf']);
    $cliente->setTelefone($dados['telefone']);
    $cliente->setEmail($dados['mail']);
    $cliente->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT)); 
    $cliente->setSexo($dados['sexo']);
    $cliente->setCep($dados['cep']);
    $cliente->setBairro($dados['bairro']);
    $cliente->setRua($dados['rua']);
    $cliente->setNumero($dados['numero']);
    $cliente->setComplemto($dados['complemento']);



    if($clientedao->CadastrarCliente($cliente)) {
//      alert('Cadastrado');
    echo "<script>
      
            location.href = '../login.php';
          </script>";
    }
}else if(isset($_POST['login'])) {

	$cliente->setEmail(strip_tags($dados['mail']));
	$cliente->setSenha(strip_tags($dados['senha'])); 

    $clientedao->login($cliente);

	if($clientedao->login($cliente)) {
    //  alert('Login com sucesso!');  
     echo "<script>
                
            location.href = '../Views/Paciente/Menu.php';
           </script>";

	} else {
    $pro->setEmail(strip_tags($dados['mail']));
    $pro->setSenha(strip_tags($dados['senha'])); 
  
      $clientedao->loginF($pro);
  
    if($clientedao->loginF($pro)) {
  //  alert('Login com sucesso!!');  
       echo "<script>
                   
              location.href = '../Views/Funcionario/funcionario.html';
             </script>";
  
    } else {
      echo "<script>
      alert('Acesso inválido! login ou senha incorretos!');
      location.href = '../login.php';
  </script>";
     
    }
      echo "<script>
            alert('Acesso inválido! login ou senha incorretos!');
            location.href = '../login.php';
        </script>";
  }
}else if(isset($_POST['sair'])){
  $clientedao->sair();
  header("Location: ../index.php");

}

?>
