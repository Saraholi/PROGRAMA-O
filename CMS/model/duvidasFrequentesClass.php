<?php

class duvidasFrequentes{
    private $idPergunta;
    private $perguntas;
    private $resposta;
    
public function __construct(){
    
}
    public function setIdPerguntas($idPergunta){
        $this->idPergunta = $idPergunta;
    }
    
    public function getIdPergunta(){
        return $this->idPergunta;
    }
    
    public function getPerguntas(){
        return $this->perguntas;
    }
    
    public function setPerguntas($perguntas){
        $this->perguntas = $perguntas;
    }
    
    
    
    public function getResposta(){
        return $this->resposta;
    }
    
    public function setResposta($resposta){
        $this->resposta = $resposta;
    }

}

?>