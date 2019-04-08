<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_DUVIDAS_FREQUENTES);
    require_once(IMPORT_DUVIDAS_FREQUENTES_CONTROLLER);

    $controllerDuvidasFrequentes = new controllerDuvidasFrequentes();
    $duvidas[] = new duvidasFrequentes();
    $duvidas = $controllerDuvidasFrequentes->listarDuvidas();
?>


<div class="titulo">DUVIDAS FREQUENTES</div>

<div class="botoes">

    <input type="button" value="Novo" class="botao" onclick="cadastrarDuvida();">
    <input type="button" value="Voltar" class="botao" onclick="admPaginas();">
    

</div>



<?php
    foreach($duvidas as $duvida){
?>





<div class="listaDados">

    <div class="dados">
    
        Pergunta:
        
    </div>
    <div class="infoDados">
    
      <?php echo($duvida->getPerguntas());?>
    
    </div>
    <div class="dados">
    
        Resposta:
        
    </div>
    <div class="infoDados">
    
        <?php echo($duvida->getResposta());?>
    
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('duvidas','buscar',<?php
        echo($duvida->getIdPergunta());?>)">Editar</a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('duvidas','excluir',<?php
        echo($duvida->getIdPergunta());?>)">Apagar</a>

    
    </div>
    
</div>


<?php
    }
?>