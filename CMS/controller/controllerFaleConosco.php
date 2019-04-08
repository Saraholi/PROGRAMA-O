<?


//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class controllerFaleConosco{
         private $conex;
    
    
    public function __construct{
        
        //Import da classe do fale conosco 
        require_once(IMPORT_FALE_CONOSCO);
       
        //IMPORT DO FALECONOSCODAO
        require_once(IMPORT_FALE_CONOSCO_DAO);
        
    }

        //UPDATE
    public function atualizarFaleConosco{
     if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_GET["id_Fale_Conosco"];
            $nome = $_POST["txtnome"];
            $email = $_POST["txtemail"];
            $assunto = $_POST["idassunto"];
            $mensagem = $_POST["txtmensagem"];
            
         // Instancia de classes 
         $faleConosco = new faleConosco();
         $faleConosco = new faleConoscoDAO();

         //Guardando os dados no objeto da classe
        $faleConosco->setnome($nome);
        $faleConosco->setemail($email);
        $faleConosco->setassunto($assunto);
        $faleConosco->setmensagem($mensagem);
        
         
         //Chamada ao metodo de inserir no banco passando como parametro o objeto .
         
         $faleConoscoDAO->update($faleConosco);
        }

}


?>