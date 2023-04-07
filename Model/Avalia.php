<?php
Class Avalia{
    private $id;
    private $id_paciente;
    private $id_profissional;
    private $avaliacao;
    private $status_a;

    private $ida;
    private $nome;
    private $media;

    function getStatus_a() {
        return $this->status_a;
    }

    function setStatus_a($status_a) {
        $this->status_a = $status_a;
    }

    function getIDA() {
        return $this->ida;
    }

    function setIDA($ida) {
        $this->ida = $ida;
    }
    
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getMedia() {
        return $this->media;
    }

    function setMedia($media) {
        $this->media = $media;
    }
    
    function getID() {
        return $this->id;
    }

    function getID_paciente() {
        return $this->id_paciente;
    }

    function getID_profissional() {
        return $this->id_profissional;
    }

    function getAvaliacao() {
        return $this->avaliacao;
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

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }






    
      
    }
