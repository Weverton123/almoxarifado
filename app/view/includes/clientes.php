<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
  seguranca_arq();
  
   session_start();
   
 
?>
<!--
	Início de conteúdo
-->
<h2>Clientes</h2>

<div id="botoes">
    <a href="?action=setor"><img src="<?=BASEIMAGES?>setor.png" />Setores</a>
    <a href="?action=usuario"><img src="<?=BASEIMAGES?>user.png" />Usuários</a>
</div>

<?php
    if(isset($conteudo)){ echo $conteudo;}
    else { echo 'Selecione algum menu!';}
?>
<!--
	Fim de conteúdo
-->
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Clientes';
  // page recebe o conteudo do buffer
  $page = ob_get_contents(); 

  //classe do controle 
  $class = 'index.php?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include(BASEVIEW."base.php");