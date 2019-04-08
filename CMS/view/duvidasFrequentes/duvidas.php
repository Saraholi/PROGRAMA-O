<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 
    require_once(IMPORT_DUVIDAS_FREQUENTES);
    require_once(IMPORT_DUVIDAS_FREQUENTES_CONTROLLER);

    $perguntas ='';
    $resposta='';
    $router = "router('duvidas', 'inserir', '0')";  

    if(isset($duvidas)){
        
        $perguntas = $duvidas->getPerguntas();
        $resposta = $duvidas->getResposta();
        
        $router = "router('duvidas','atualizar','".$duvidas->getIdPergunta()."')";
    }


?>

<div class="titulo">DUVIDAS FREQUENTES</div>

<form id="form" method="POST">
 
<table>
  
    <tr>
            <td class="label2">
                Pergunta:
            </td>
            <td class="input2">
              <input type="text" size="20" name="txtPerguntas" value="<?php echo($perguntas)?>">
            </td>
        </tr>
        <tr>
            <td class="label2">
                Resposta:
            </td>
            <td class="input2">
              <input type="text" size="20" name="txtResposta" value="<?php echo($resposta)?>">
            </td>
        </tr>
        <tr>
            <td class="label2">
            <input type="submit" value="Voltar" class="botao2" onclick="admPaginas();">
            </td>
    
            <td class="input2">
                 <input type="submit" value="Enviar" class="botao2" onclick="<?php echo($router)?>">
               
                
                    
            </td>
        </tr>
</table>
    
</form>