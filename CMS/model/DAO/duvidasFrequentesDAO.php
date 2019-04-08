<?php
@session_start();
require_once($_SESSION["importInclude"]); 

class duvidasFrequentesDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(DuvidasFrequentes $duvidasFrequentes){
        $sql = INSERT.TABELA_DUVIDAS_FREQUENTES. " 
        (pergunta,resposta)
        VALUES(
        '".$duvidasFrequentes->getPerguntas()."',
        '".$duvidasFrequentes->getResposta()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
          
            echo("<script>alert('Pergunta adicionado com sucesso.');</script>");
        }else{
            
            echo("<script>alert('Pergunta Não Cadastrada.');</script>");
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }
    
      
        //APAGAR REGISTRO
    public function delete($id){
        $sql = DELETE .TABELA_DUVIDAS_FREQUENTES." where idPergunta=".$id;
    
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();
    
    
    //Executa no Banco de dados o Script do Insert
            if($PDO_conex->query($sql)){
                //header('location:duvidas.php');
            }else{
//                echo('Erro no Script de DELETE!!! ');
                echo($sql);
            }
            
     
            // Fecha a conexão com o banco de dados
            $this -> conex-> closeDatabase();
    }
    
    //LISTA TODOS OS REGISTRO
        public function selectAll(){
            
        $sql = SELECT.TABELA_DUVIDAS_FREQUENTES;
      
             //Abrindo a conexao com o banco de dados 
           $PDO_conex = $this -> conex->connectDatabase();
            
            //Executa o Script de SELECT no banco de dados 
            $select = $PDO_conex ->query($sql);
            
            $cont = 0;
            
            
            $duvidasFrequentes[]=new duvidasFrequentes();
            $duvidasFrequentes = null;
            while ($rsDuvidasFrequentes=$select->fetch(PDO::FETCH_ASSOC)){
                
                $duvidaFrequente = new duvidasFrequentes();
                
                 $duvidaFrequente->setIdPerguntas($rsDuvidasFrequentes["idPergunta"]);
                 $duvidaFrequente->setPerguntas($rsDuvidasFrequentes["pergunta"]);
                 $duvidaFrequente->setResposta($rsDuvidasFrequentes["resposta"]);
                
                
                    $duvidasFrequentes[$cont]  = $duvidaFrequente;

                    $cont++;
                }
    
             // Fecha a conexão com o banco de dados
                $this->conex->closeDatabase();
                        
             return ($duvidasFrequentes);
     
        }
    
    
        // Seleciona pelo ID
        
    public function selectById($id){
        
        $sql = SELECT. TABELA_DUVIDAS_FREQUENTES . " where idPergunta=".$id;
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        
        
        if($rsDuvida=$select->fetch(PDO::FETCH_ASSOC)){
            
            $duvida = new duvidasFrequentes();
            
            $duvida -> setIdPerguntas($rsDuvida["idPergunta"]);
            $duvida -> setPerguntas($rsDuvida["pergunta"]);
            $duvida -> setResposta($rsDuvida["resposta"]);
        }
        
        $this->conex->closeDataBase();

        return($duvida);
        
        
        
        
    }

    public function update(DuvidasFrequentes $duvidasFrequentes){
        
        $sql = UPDATE . TABELA_DUVIDAS_FREQUENTES . " 
        SET pergunta = '".$duvidasFrequentes->getPerguntas()."',
            resposta = '".$duvidasFrequentes->getResposta()."'
        WHERE idPergunta = '".$duvidasFrequentes->getIdPergunta()."';";
        
   //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            //echo($sql);
            
            echo("<script>alert('Dúvidas Frequentes  atualizada com sucesso.');</script>");
        }else{
            //echo(ERRO_SCRIPT);
            echo($sql);
            
            
            echo("<script>alert(''Dúvidas Frequentes Não Atualizada.');</script>");
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }
    

}
?>