<?php
@session_start();
require_once($_SESSION["importInclude"]); 

class faleConoscoDAO{
    private $conex;

        public function __construct(){
    //Import da classe do banco para todos os métodos
    require_once(IMPORT_CONEXAO);
    //Instacia da Classe Conexão
    $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco da dados.
    public function insert(FaleConosco $faleConosco){
        $sql = INSERT.TABELA_FALE_CONOSCO."(nome,email,idAssunto,mensagem) VALUES(
            '".$faleConosco->getNome()."',
            '".$faleConosco->getEmail()."',
            '".$faleConosco->getIdAssunto()."',
            '".$faleConosco->getMensagem()."'
        )";

        //Abrindo conexão com o Banco de Dados 
        $PDO_conex = $this->$conex->connectDataBase();


        //Executa no Banco o Script Insert e retorna Verdadeiro ou Falso.
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            echo("<script>alert('Registro Fale Conosco adicionado com sucesso.');</script>");
        }else{
           
            echo("<script>alert('Registro Fale Conosco Não Cadastrada.');</script>");
        }

   
        $this->conex->closeDataBase();
    }

    //APAGAR REGISTRO
     public function delete($id){
        $sql = DELETE .TABELA_FALE_CONOSCO." where idFale_Conosco=".$id;
    
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();
     }

// Selecionar o Registro pelo ID 
public function selectById($id){
        
    $sql = SELECT. TABELA_FALE_CONOSCO ." where idFale_Conosco=".$id;
    //Abrindo conexão com o BD
    $PDO_conex = $this->conex->connectDataBase();

    //executa o script de select no bd
    $select = $PDO_conex->query($sql);

    if($rsFaleConosco=$select->fetch(PDO::FETCH_ASSOC)){
            
        $faleConosco = new FaleConosco();
        
        $faleConosco -> setIdPerguntas($rsFaleConosco["nome"]);
        $faleConosco -> setPerguntas($rsFaleConosco["email"]);
        $faleConosco -> setResposta($rsFaleConosco["idAssunto"]);
        $faleConosco -> setResposta($rsFaleConosco["mensagem"]);
    }
    
    $this->conex->closeDataBase();

    return($faleConosco);
    }

    

    //LISTA TODOS OS REGISTRO
    public function selectAll(){
            
    $sql = SELECT.TABELA_FALE_CONOSCO;
  
         //Abrindo a conexao com o banco de dados 
       $PDO_conex = $this -> conex->connectDatabase();
        
        //Executa o Script de SELECT no banco de dados 
        $select = $PDO_conex ->query($sql);
        
        $cont = 0;
        
        $faleConosco[]=new faleConosco();   
        $faleConosco=null;
        while($rsFaleConosco=$select->fetch(PDO::FETCH_ASSOC)){

        $faleConosco[]=new faleConosco();   

        $faleConosco->setNome($rsFaleConosco["nome"]);
        $faleConosco->setNome($rsFaleConosco["email"]);
        $faleConosco->setNome($rsFaleConosco["idAssunto"]);
        $faleConosco->setNome($rsFaleConosco["mensagem"]);


        $faleConosco[$cont] =  $faleConosco;

        $cont++;
}
 // Fecha a conexão com o banco de dados
 $this->conex->closeDatabase();
                        
 return ($faleConosco);
}
}
?>