<?php

Class ClienteDao {
    
    public function CadastrarCliente(Cliente $cliente) {
        try {

            $sql = "INSERT INTO paciente(nome, idade, cpf, telefone, email, senha, sexo, cep, bairro, rua, numero, complemento) VALUES (:nome, :idade, :cpf, :telefone, :email, :senha, :sexo, :cep, :bairro, :rua, :numero, :complemento)";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $cliente->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":idade", $cliente->getIdade(), PDO::PARAM_STR);
            $stmt->bindValue(":cpf", $cliente->getCPF(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $cliente->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $cliente->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":sexo", $cliente->getSexo(), PDO::PARAM_STR);
            $stmt->bindValue(":cep", $cliente->getCep(), PDO::PARAM_STR);
            $stmt->bindValue(":bairro", $cliente->getBairro(), PDO::PARAM_STR);
            $stmt->bindValue(":rua", $cliente->getRua(), PDO::PARAM_STR);
            $stmt->bindValue(":numero", $cliente->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(":complemento", $cliente->getComplemento(), PDO::PARAM_STR);
            
           
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Inserir usuario <br>" . $e->getMessage() . '<br>';
        }
    
    }

    public function CadastrarProfissional(Profissional $profissional) {
        try {

            $sql = "INSERT INTO profissional(nome, idade, cpf, telefone, email, senha, sexo, cargo, foto, avaliacao) VALUES (:nome, :idade, :cpf, :telefone, :email, :senha, :sexo, :cargo, :img, 0)";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $profissional->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":idade", $profissional->getIdade(), PDO::PARAM_STR);
            $stmt->bindValue(":cpf", $profissional->getCPF(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $profissional->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $profissional->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $profissional->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":sexo", $profissional->getSexo(), PDO::PARAM_STR);
            $stmt->bindValue(":cargo", $profissional->getCargo(), PDO::PARAM_STR);
       
            $nomep = $profissional->getNome();
            $imagem = $profissional->getFoto();
            include '../Includes/upload_img.php';
            $stmt->bindValue(":img", $nome_imagem, PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Inserir usuario <br>" . $e->getMessage() . '<br>';
        }
    
    }

    public function login(Cliente $cliente) {
		try {
			$sql = "SELECT * FROM paciente WHERE email = :email";
			$stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":email", $cliente->getEmail(), PDO::PARAM_STR);
         
            $stmt->execute();
			$user_linha = $stmt->fetch(PDO::FETCH_ASSOC);
					
			if($stmt->rowCount() == 1) {

				if(password_verify($cliente->getSenha(), $user_linha['senha'])) {

					$_SESSION['user_session'] = $user_linha['id_paciente'];
                    session_start();
					return true;
                    
				} else {
					return false;
				}
			}
		}

		catch(PDOException $e) {

			echo "Erro ao tentar realizar o login do usuario" . $e->getMessage();
		}
	}
    
    public function loginF(Profissional $profissional) {
        try {
            $sql = "SELECT * FROM profissional WHERE email = :email";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":email", $profissional->getEmail(), PDO::PARAM_STR);
         
            $stmt->execute();
            $user_linha = $stmt->fetch(PDO::FETCH_ASSOC);
                    
            if($stmt->rowCount() == 1) {

                if(password_verify($profissional->getSenha(), $user_linha['senha'])) {

                    $_SESSION['user_session'] = $user_linha['id_profissional'];
                    session_start();
                    return true;
                    
                } else {
                    return false;
                }
            }
        }
    catch(PDOException $e) {

        echo "Erro ao tentar realizar o login do usuario" . $e->getMessage();
    }
}

public function listar() {
    try {
        $sql = "SELECT * FROM profissional";
        $stmt = Conexao::getConexao()->query($sql);
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $list = array();

        foreach ($lista as $linha) {
            $list[] = $this->listaUsuarios($linha);
        }

        return $list;

    } catch (PDOException $e) {
        echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
    }
}
private function listaUsuarios($linhas) {

    $cliente = new Profissional();
    $cliente->setID($linhas['id_profissional']);
    $cliente->setNome($linhas['nome']);
    $cliente->setEmail($linhas['email']);
    $cliente->setTelefone($linhas['telefone']);
    $cliente->setSexo($linhas['sexo']);
    $cliente->setFoto($linhas['foto']);
    $cliente->setAvaliacao($linhas['avaliacao']);

    return $cliente;
}


// Lista paciente
public function user() {
    try {
        $sql = "SELECT * FROM paciente WHERE id_paciente = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $_SESSION['user_session'], PDO::PARAM_INT);
        $stmt->execute();
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $list = array();

        foreach ($lista as $linha) {
            $list[] = $this->listaP($linha);
        }

        return $list;
    } catch (PDOException $e) {
        echo "Ocorreu um erro ao tentar buscar Cliente." . $e->getMessage();
    }
}
private function listaP($linhas) {

    $cliente = new Cliente();
    $cliente->setID($linhas['id_paciente']);
    $cliente->setNome($linhas['nome']);
    $cliente->setEmail($linhas['email']);
    $cliente->setTelefone($linhas['telefone']);
    $cliente->setSexo($linhas['sexo']);

    return $cliente;
}

public function checkLogin() {
    if(isset($_SESSION['user_session'])) {
        return true;
    }else {
        return false;
    }
    
}
public function sair() {
    session_start();
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
}

}
  
?>