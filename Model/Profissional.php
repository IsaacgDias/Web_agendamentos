<?php
Class Profissional{
    private $id;
    private $nome;
    private $idade;
    private $sexo;
    private $cpf;
    private $telefone;
    private $email;
    private $senha;
    private $cargo;
    private $foto;
    private $desc;
    private $avaliacao;

    //atendimento
    private $data;
    private $hora;
    private $ida;
    private $turno;
        
        function getTurno() {
            return $this->turno;
        }

        
        function setTurno($turno) {
            $this->turno = $turno;
        }

        function getDesc() {
            return $this->desc;
        }

        function getIDA() {
            return $this->ida;
        }

        function setIDA($ida) {
            $this->ida = $ida;
        }

        function getAvaliacao() {
            return $this->avaliacao;
        }

        function setAvaliacao($avaliacao) {
            $this->avaliacao = $avaliacao;
        }


        function setDesc($desc) {
            $this->desc = $desc;
        }

        function getData() {
            return $this->data;
        }

        function getHora() {
            return $this->hora;
        }

        function setData($data) {
            $this->data = $data;
        }

        function setHora($hora) {
            $this->hora = $hora;
        }

        function getID() {
            return $this->id;
        }

        function getFoto() {
            return $this->foto;
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

        function getSenha() {
            return $this->senha;
        }

        function getCargo() {
            return $this->cargo;
        }

        function setIdade($idade) {
            $this->idade = $idade;
        }

        function setCargo($cargo) {
            $this->cargo = $cargo;
        }

        function setID($id) {
            $this->id = $id;
        }

        function setFoto($foto) {
            $this->foto = $foto;
        }
        function setNome($nome) {
            $this->nome = $nome;
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
      
    }

?>    