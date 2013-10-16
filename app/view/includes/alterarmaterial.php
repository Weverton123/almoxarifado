<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();
session_cache_expire(0.1); 
session_start();

 require_once (BASEMODEL.'conexaoBD.php');
 require_once (BASEMODELDAO.'materialDAO.php');
 require_once (BASEMODELDAO.'categoriaDAO.php');


if(!isset($_SESSION['session']['acoes']['idmaterial'])){
      redirecionar('?action=material');
}

                        $mat = $_SESSION['session']['acoes']['idmaterial'];
                                              
                        $material = new materialDAO();
                        $ret = $material->ObterPorNome($mat);


if(isset($_REQUEST['alterarN'])){//validação de formulário para alterar nome do material
          if(isset($_REQUEST['newname']) && $_REQUEST['newname'] != NULL){//valida se o campo nome para editar foi informado
              $control = 'material';//controle no qual tem os metodos para material
              $action = 'alterarnome';//ação
              
              $_vals = array(   'idmaterial' => $_SESSION['session']['acoes']['idmaterial'],
                                'newname' => $_REQUEST['newname'],
                                'nomeatual' => $ret->getNome(),
                                'grupoatual' => $ret->getCategoria_idcategoria()
                      );
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
            } 
          else{
                $_SESSION['session']['acoes']['msg'] = 'O novo nome não foi informado!';
          }  
}//fim alterarN 

if(isset($_REQUEST['alterarQ'])){//validação de formulário para alterar nome do material
          if(isset($_REQUEST['newquantidade'])&& $_REQUEST['newquantidade'] != NULL){//valida se o campo nome para editar foi informado
              $control = 'material';//controle no qual tem os metodos para material
              $action = 'alterarquantidade';//ação
              
              $_vals = array(   'idmaterial' => $_SESSION['session']['acoes']['idmaterial'],
                                'newquantidade' => $_REQUEST['newquantidade']);
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
            } 
          else{
                $_SESSION['session']['acoes']['msg'] = 'A nova quantidade não foi informada!';
          }  
}//fim alterarQ

if(isset($_REQUEST['alterarG'])){//validação de formulário para alterar nome do material
          if(isset($_REQUEST['newgrupo'])&& $_REQUEST['newgrupo'] != '-1'){//valida se o campo nome para editar foi informado
              $control = 'material';//controle no qual tem os metodos para material
              $action = 'alterargrupo';//ação
              
              $_vals = array(   'idmaterial' => $_SESSION['session']['acoes']['idmaterial'],
                                'newgrupo' => $_REQUEST['newgrupo']);
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
            } 
          else{
                $_SESSION['session']['acoes']['msg'] = 'O novo grupo não foi informado!';
          }  
}//fim alterarG


if(isset($_REQUEST['alterarD'])){//validação de formulário para alterar nome do material
          if(isset($_REQUEST['newdetalhes'])&& $_REQUEST['newdetalhes'] != NULL){//valida se o campo nome para editar foi informado
              $control = 'material';//controle no qual tem os metodos para material
              $action = 'alterardetalhes';//ação
              
              $_vals = array(   'idmaterial' => $_SESSION['session']['acoes']['idmaterial'],
                                'newdetalhes' => $_REQUEST['newdetalhes']);
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
            } 
          else{
                $_SESSION['session']['acoes']['msg'] = 'Um novo detalhe não foi informado!';
          }  
}//fim alterarQ


?>
<!--
        Início de Conteúdo
-->
<div class="modulo">
<h3>Editar material</h3>	
	
		<p>
			<strong>Dados do Material</strong><br />
		</p>
<p>
    <strong>Nome atual:</strong> <?=$ret->getNome() ?>
</p>
<p>
    <strong>Quantidade atual:</strong> <?=$ret->getQuantidadeatual() ?>
</p>
<p>
    <strong>Grupo atual:</strong> <?=$ret->getCategoria_idcategoria() ?>
</p>
<p>
    <strong>Detalhes atual:</strong> <?=$ret->getDetalhes() ?>
</p>
<form method="POST">
    <p> 
        <strong>Novo nome:</strong><br>
        <input type="text" name="newname">
    </p>
    <p>
        <input type="submit" name="alterarN" value="Alterar nome">
    </p>
</form>
<form method="POST">
    <p>
        <strong>Nova Quantidade :</strong><br>
        <input type="number" name="newquantidade" style="width:360px;height:30px; text-align:center;">
    </p>
    <p>
        <input type="submit" name="alterarQ" value="Alterar código">
    </p>
</form>
<form method="POST">
    <p>
        <strong>Novo grupo :</strong><br>
         <select name="newgrupo">
            <option value="-1" selected>Selecione o grupo</option>
            <?php
                $listaCateg = new categoriaDAO();
                $list = $listaCateg->ObterPorTodos();
                foreach ($list as $ls){
                    echo "<option value='{$ls->getIdcategoria()}'>{$ls->getNome()}</option>";
                }

            ?>
        </select>
    </p>
    <p>
        <input type="submit" name="alterarG" value="Alterar grupo">
    </p>
</form>
<form method="POST">
    <p>
        <strong>Novo detalhe:</strong><br>
        <textarea name="newdetalhes" style="width:360px;height:110px; "></textarea>
    </p>
    <p>
        <input type="submit" name="alterarD" value="Alterar detalhes">
    </p>
</form>
</div>
<!--
        Fim de Conteúdo
-->

<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: ADD::Material';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."requisicoes.php");