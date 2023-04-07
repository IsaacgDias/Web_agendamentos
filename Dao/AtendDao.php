<?php
Class AtendimentoDao {
    public function Agendamento(Atendimento $atedimento) {
        try {
    
            $sql = "INSERT INTO atendimento(id_paciente, id_profissional, turno, observacao, descricao, status) VALUES (:id_paciente, :id_profissional, :turno, :observacao, :descricao, :status)";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_paciente", $_SESSION['user_session'], PDO::PARAM_STR);
            $stmt->bindValue(":id_profissional", $atedimento->getID_profissional(), PDO::PARAM_STR);
            $stmt->bindValue(":turno", $atedimento->getTurno(), PDO::PARAM_STR);
            $stmt->bindValue(":observacao", $atedimento->getObs(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $atedimento->getDesc(), PDO::PARAM_STR);
            $stmt->bindValue(":status", $atedimento->getStatus(), PDO::PARAM_STR);
          
          

            return $stmt->execute();
    
        } catch (PDOException $e) {
            echo "Erro ao Inserir agendamento <br>" . $e->getMessage() . '<br>';
        }
    
    }

    public function Agendado() {
        try {
            //$sql = "SELECT id_paciente FROM atendimento WHERE id_paciente = $_SESSION[user_session];";
            $sql = "SELECT profissional.nome, profissional.foto, atendimento.turno, atendimento.observacao FROM profissional INNER JOIN atendimento ON profissional.id_profissional = atendimento.id_profissional INNER JOIN paciente ON paciente.id_paciente = atendimento.id_paciente WHERE atendimento.id_paciente = $_SESSION[user_session] AND atendimento.status = 'Pendente'";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
            
            foreach ($lista as $linha) {
                $list[] = $this->listaAgendados($linha);
            }
    
            if($list == NULL){
                echo "<script>
                alert('Faça um agendamento ou verifique as solicitações confirmadas!');
                location.href = 'Menu.php';
            </script>";
            }else{
                return $list;
            }
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }
    private function listaAgendados($linhas) {
    
        $cliente = new Profissional();
        $cliente->setNome($linhas['nome']);
        $cliente->setTurno($linhas['turno']);
        $cliente->setFoto($linhas['foto']);
        $cliente->setDesc($linhas['observacao']);
    
        return $cliente;
    }

    
    public function AgendadoConfirmado() {
        //AQUI
        try {
    
            $sql = "SELECT profissional.id_profissional, profissional.nome, profissional.foto, atendimento.observacao, atendimento.id_profissional, atendimento.id_atendimento, atendimento.turno FROM profissional INNER JOIN atendimento ON profissional.id_profissional = atendimento.id_profissional INNER JOIN paciente ON paciente.id_paciente = atendimento.id_paciente WHERE atendimento.id_paciente = $_SESSION[user_session] And atendimento.status = 'Confirmado'";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
            
            foreach ($lista as $linha) {
                $list[] = $this->listaC($linha);
            }
    
            if($list == NULL){
                echo "<script>
                alert('Nenhum agendamento foi confirmado!');
                location.href = 'Menu.php';
            </script>";
            }else{
                return $list;
            }
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }
    private function listaC($linhas) {
    
        $cliente = new Profissional();
        $cliente->setID($linhas['id_profissional']);
        $cliente->setIDA($linhas['id_atendimento']);
        $cliente->setNome($linhas['nome']);
        $cliente->setFoto($linhas['foto']);
        $cliente->setDesc($linhas['observacao']);
        $cliente->setTurno($linhas['turno']);

    
        return $cliente;
    }

    public function AgendadoID() {
        //AQUI
        try {
    
            $sql = "SELECT profissional.id_profissional, profissional.nome, profissional.foto, atendimento.observacao, atendimento.id_profissional, atendimento.id_atendimento FROM profissional INNER JOIN atendimento ON profissional.id_profissional = atendimento.id_profissional INNER JOIN paciente ON paciente.id_paciente = atendimento.id_paciente WHERE atendimento.id_paciente = $_SESSION[user_session] And atendimento.status = 'Confirmado'";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
            
            foreach ($lista as $linha) {
                $list[] = $this->listaC1($linha);
            }
    
            if($list == NULL){
                echo "<script>
                alert('Nenhum agendamento foi confirmado!');
                location.href = 'Menu.php';
            </script>";
            }else{
                return $list;
            }
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }
    private function listaC1($linhas) {
    
        $cliente = new Profissional();
        $cliente->setIDA($linhas['id_atendimento']);
  
        
    
        return $cliente;
    }


    public function BuscaCancel(){
        try {    
        //$sql = "SELECT id_paciente FROM atendimento WHERE id_paciente = $_SESSION[user_session];";
           $sql = "SELECT id_atendimento FROM atendimento WHERE id_paciente = $_SESSION[user_session];";
           $stmt = Conexao::getConexao()->query($sql);
           $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $list = array();
   
           foreach ($lista as $linha) {
               $list[] = $this->listaAgend($linha);
           }
   
           return $list;
   
       } catch (PDOException $e) {
           echo "Ocorreu um erro ao tentar buscar agendamentos." . $e->getMessage();
       }
        
    }
    private function listaAgend($linhas) {
    
        $cliente = new Atendimento();
        $cliente->setID($linhas['id_atendimento']);
   
    
        return $cliente;
    }
    
    public function CancelaConfirmado(){
        try {    
        //$sql = "SELECT id_paciente FROM atendimento WHERE id_paciente = $_SESSION[user_session];";
           $sql = "SELECT id_atendimento FROM atendimento WHERE id_paciente = $_SESSION[user_session] AND status = 'Confirmado'";
           $stmt = Conexao::getConexao()->query($sql);
           $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $list = array();
   
           foreach ($lista as $linha) {
               $list[] = $this->listaAgend2($linha);
           }
   
           return $list;
   
       } catch (PDOException $e) {
           echo "Ocorreu um erro ao tentar buscar agendamentos." . $e->getMessage();
       }
        
    }
    private function listaAgend2($linhas) {
    
        $cliente = new Atendimento();
        $cliente->setID($linhas['id_atendimento']);
   
    
        return $cliente;
    }
    public function Cancelar(Atendimento $atendimento) {
        try {

            $sql = "DELETE FROM atendimento WHERE id_atendimento = :id and id_paciente = $_SESSION[user_session];";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $atendimento->getID(), PDO::PARAM_INT);
            return $stmt->execute();
            

        } catch (PDOException $e) {
            echo "Erro ao Excluir produto" . $e->getMessage();
        }
    }

    

    public function Pedidos() {
        try {
            //$sql = "SELECT id_paciente FROM atendimento WHERE id_paciente = $_SESSION[user_session];";
            $sql = "SELECT atendimento.id_atendimento, paciente.nome, paciente.sexo, paciente.cep, paciente.bairro, paciente.rua, paciente.numero, paciente.complemento, atendimento.turno, atendimento.observacao FROM paciente INNER JOIN atendimento ON paciente.id_paciente = atendimento.id_paciente INNER JOIN profissional ON profissional.id_profissional = atendimento.id_profissional WHERE atendimento.status = 'Pendente' AND atendimento.id_profissional = $_SESSION[user_session];";
            
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
    
            foreach ($lista as $linha) {
                $list[] = $this->listaPedidos($linha);
            }
            if($list == NULL){
                echo "<script>
                alert('Sem pedidos dos clientes!');
                location.href = 'funcionario.html';
            </script>";
            }else{
                return $list;
            }
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }
    private function listaPedidos($linhas) {
    
        $cliente = new Cliente();
        $cliente->setID($linhas['id_atendimento']);
        $cliente->setNome($linhas['nome']);
        $cliente->setSexo($linhas['sexo']);
        $cliente->setCep($linhas['cep']);
        $cliente->setBairro($linhas['bairro']);
        $cliente->setRua($linhas['rua']);
        $cliente->setNumero($linhas['numero']);
        $cliente->setComplemto($linhas['complemento']);
        $cliente->setTurno($linhas['turno']);
        $cliente->setObs($linhas['observacao']);
        return $cliente;
    }

    public function Confirmacao(Atendimento $atendimento) {
        try {
            $sql = "UPDATE atendimento SET status = 'Confirmado' WHERE id_profissional = $_SESSION[user_session] AND id_atendimento = :id;";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $atendimento->getID(), PDO::PARAM_INT);
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar atualizar Produto." . $e->getMessage();
        }
    }

    public function PedidosAndamento() {
        try {
            $sql = "SELECT atendimento.id_atendimento, paciente.nome, paciente.sexo, paciente.cep, paciente.bairro, paciente.rua, paciente.numero, paciente.complemento, atendimento.turno, atendimento.observacao  FROM paciente INNER JOIN atendimento ON paciente.id_paciente = atendimento.id_paciente INNER JOIN profissional ON profissional.id_profissional = atendimento.id_profissional WHERE atendimento.status = 'Confirmado' AND atendimento.id_profissional = $_SESSION[user_session];";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
    
            foreach ($lista as $linha) {
                $list[] = $this->listaPedidos($linha);
            }
            if($list == NULL){
                echo "<script>
                alert('Nenhum pedido em andamento!!');
                location.href = 'funcionario.html';
            </script>";
            }else{
                return $list;
            }
       
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }

    public function BuscaStatus() {
        try {
            $sql = "SELECT status FROM atendimento WHERE id_paciente = $_SESSION[user_session];";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
    
            foreach ($lista as $linha) {
                $list[] = $this->listaStatus($linha);
            }
    
            return $list;
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }

    private function listaStatus($linhas) {
    
        $atendimento = new Atendimento();
        $atendimento->setStatus($linhas['status']);
      
        return $atendimento;
    }

    public function finalizar() {
        try {
            $sql = "SELECT profissional.id_profissional, atendimento.id_atendimento, profissional.nome FROM profissional INNER JOIN atendimento WHERE profissional.id_profissional = :id AND id_atendimento = :ida";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $_POST['id_e'], PDO::PARAM_INT);
            $stmt->bindValue(":ida", $_POST['id_a'], PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaProdutos($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
        }

    }

    private function listaProdutos($linhas) {

        $produto = new Profissional();
        $produto->setID($linhas['id_profissional']);
        $produto->setIDA($linhas['id_atendimento']);
        $produto->setNome($linhas['nome']);
        
        return $produto;
    }

    public function Avaliacao(Avalia $avaliacao) {
        try {
    
            $sql = "INSERT INTO avalia(id_paciente, id_profissional, avaliacao) VALUES (:id_paciente, :id_profissional, :avaliacao);";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_paciente", $_SESSION['user_session'], PDO::PARAM_STR);
            $stmt->bindValue(":id_profissional", $avaliacao->getID_profissional(), PDO::PARAM_STR);
            $stmt->bindValue(":avaliacao", $avaliacao->getAvaliacao(), PDO::PARAM_STR);
         
          
          

            return $stmt->execute();
    
        } catch (PDOException $e) {
            echo "Erro ao Inserir avaliação <br>" . $e->getMessage() . '<br>';
        }
    
    }

      public function Media(Avalia $avaliacao) {
        try {
            $sql = "SELECT (SUM(avaliacao)/COUNT(*)) as media FROM avalia WHERE id_profissional = :id";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $avaliacao->getID_profissional(), PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
          
            foreach ($lista as $linha) {
                $list[] = $this->listaMedia($avaliacao->setMedia(($linha['media'])));
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
        }

    }

    public function listaMedia($linhas) {

        $avaliacao = new Avalia();
       
        $avaliacao->setMedia($linhas['media']);

        //echo '<script> alert('. $avaliacao->getMedia() . '); </script>';
        
    }

    public function Guardamedia(Avalia $avaliacao) {
        try {
    
            $sql = "UPDATE profissional SET avaliacao = :avaliacao WHERE id_profissional = :id;";
            $media = $avaliacao->getMedia();

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":avaliacao", $media, PDO::PARAM_STR);
            $stmt->bindValue(":id", $avaliacao->getID_profissional(), PDO::PARAM_STR);
           
           // echo '<script> alert('. $avaliacao->getMedia() . '); </script>';
            
          

            return $stmt->execute();
    
        } catch (PDOException $e) {
            echo "Erro ao Inserir avaliação <br>" . $e->getMessage() . '<br>';
        }
    
    }
    public function UpStatus() {
        try {
    
            $sql = "UPDATE atendimento SET status = 'Finalizado' WHERE id_atendimento = :ida;";
           

            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(":ida", $_POST['id_a'], PDO::PARAM_STR);
           
         
          
          

            return $stmt->execute();
    
        } catch (PDOException $e) {
            echo "Erro ao Inserir avaliação <br>" . $e->getMessage() . '<br>';
        }
    
    }
}
?>
