<?php
Class Atendimento{
    private $id;
    private $id_paciente;
    private $id_profissional;
    private $data;
    private $hora;
    private $obs;
    private $desc;
    private $status;
    private $turno;

    private $nome;
        
        function getTurno() {
            return $this->turno;
        }

        function setTurno($turno) {
            $this->turno = $turno;
        }

        function getID() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function getID_paciente() {
            return $this->id_paciente;
        }

        function getID_profissional() {
            return $this->id_profissional;
        }

        function getData() {
            return $this->data;
        }

        function getHora() {
            return $this->hora;
        }

        function getObs() {
            return $this->obs;
        }

        function getDesc() {
            return $this->desc;
        }

        function getStatus() {
            return $this->status;
        }

        function setStatus($status) {
            $this->status = $status;
        }

        function setID($id) {
            $this->id = $id;
        }

        function setID_paciente($id_paciente) {
            $this->id_paciente = $id_paciente;
        }

        function setID_profissional($id_profissional) {
            $this->id_profissional = $id_profissional;
        }

        function setData($data) {
            $this->data = $data;
        }

        function setHora($hora) {
            $this->hora = $hora;
        }

        function setObs($obs) {
            $this->obs = $obs;
        }

        function setDesc($desc) {
            $this->desc = $desc;
        }
      
    }

?>    
