<?php
@session_start();
require_once($_SESSION["importInclude"]);

class controllerDuvidasFrequentes{
    
    public function __contruct(){
        
        require_once(IMPORT_DUVIDAS_FREQUENTES);
        
        require_once(IMPORT_DUVIDAS_FREQUENTES_DAO);
    }
    
    
    
    public function inserirDuvida(){
        
        $duvidasFrequenteDAO=new duvidasFrequenteDAO();
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $perguntas = $_POST["txtperguntas"];
            $resposta = $_POST["txtresposta"];
            
            $duvidas = new Duvidas();
            
            
            $perguntas -> setPergunta($pergunta);
            $resposta-> setResposta($resposta);
            
            $duvidasFrequentesDAO->insert($duvidas);
            
        }
        
    }
    
    
    
    
}











































?>