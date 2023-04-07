<?php
Class Cliente{
    private $id;
    private $nome;
    private $idade;
    private $sexo;
    private $cpf;
    private $telefone;
    private $email;
    private $senha;
   

    private $rua;
    private $numero;
    private $cep;
    private $bairro;
    private $complemento;

    //atendimento
    private $turno;
    private $obs;

            function getTurno() {
                return $this->turno;
            }

            function setTurno($turno) {
                $this->turno = $turno;
            }

            function getObs() {
                return $this->obs;
            }
            
            function setObs($obs) {
                $this->obs = $obs;
            }

        
        function getID() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getIdade() {
            return $this->idade;
        }

        function getCPF() {
            return $this->cpf;
        }

        function getEmail() {
            return $this->email;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function getSexo() {
            return $this->sexo;
        }

        function getRua() {
            return $this->rua;
        }
        function getNumero() {
            return $this->numero;
        }
        function getCep() {
            return $this->cep;
        }
        function getBairro() {
            return $this->bairro;
        }
        function getComplemento() {
            return $this->complemento;
        }

        function getSenha() {
            return $this->senha;
        }
        function setID($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setIdade($idade) {
            $this->idade = $idade;
        }

        function setCPF($cpf) {
            $this->cpf = $cpf;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        function setSexo($sexo) {
            $this->sexo = $sexo;
        }

        function setSenha($senha) {
            $this->senha = $senha;
        }

        function setRua($rua) {
            $this->rua = $rua;
        }
        function setNumero($numero) {
            $this->numero = $numero;
        }
        function setCep($cep) {
            $this->cep = $cep;
        }
        function setBairro($bairro) {
            $this->bairro = $bairro;
        }
        function setComplemto($complemento) {
            $this->complemento = $complemento;
        }
      
    }
      

?>    