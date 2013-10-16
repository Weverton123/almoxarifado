<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

session_start();

require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELDAO.'setorDAO.php');

if(!isset($_SESSION['session']['acoes']['idsetor'])){
      redirecionar('?action=setor');
}

 if(isset($_REQUEST['alterarN'])){//validação de formulário para alterar nome do setor
          if(isset($_REQUEST['newname'])){//valida se o campo nome para editar foi informado
              $control = 'setor';//controle no qual tem os metodos para setor
              $action = 'alterarnome';//ação
              
              $_vals = array(   'idsetor' => $_SESSION['session']['acoes']['idsetor'],
                                'newname' => $_REQUEST['newname']);
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
            } 
          else{
                $_SESSION['session']['acoes']['msg'] = 'O novo nome não foi informado!';
          }  
    } 
 if(isset($_REQUEST['alterarC'])){//validação de formulário para alterar controle
          if(isset($_REQUEST['newcod'])){//valida se o campo codigo para editar foi informado
              $control = 'setor';//controle no qual tem os metodos para setor
              $action = 'alterarcodigo';//ação
              
              $_vals = array(   'idsetor'=> $_SESSION['session']['acoes']['idsetor'], 
                                'newcod' => $_REQUEST['newcod']);
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
            } 
          else{
                $_SESSION['session']['acoes']['msg'] = 'O novo código não foi informado!';
          } 
    } 

?>
<!--
        Início de Conteúdo
-->
<?php 
                        $set = $_SESSION['session']['acoes']['idsetor'];
                        
                        $setor = new setorDAO();
                        $ret = $setor->ObterPorPK($set);
                       
?>
<div class="modulo">
<h3>Editar setor</h3>	
	
		<p>
			<strong>Dados do setor</strong><br />
		</p>
<p>
    <strong>Nome atual:</strong><?=$ret->getNome() ?>
</p>
<p>
    <strong>Código atual:</strong><?=$ret->getCodigo() ?>
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
        <strong>Novo código:</strong><br>
        <input type="text" name="newcod">
    </p>
    <p>
        <input type="submit" name="alterarC" value="Alterar código">
    </p>
</form>
</div>
<!--
        Fim de Conteúdo
-->
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Editar setor';
   // page recebe o conteudo do buffer
   $conteudo = ob_get_contents(); 
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."clientes.php");
