<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
   seguranca_arq();
ob_start();

  session_cache_expire(0.1);
   session_start();
   
 
?>
<!--
	Início de conteúdo
-->
<h2>Requisição</h2>

<div id="botoes">
    <a href="?action=material"><img src="<?=BASEIMAGES?>setor.png" />Material</a>
    <a href="?action=requisicao"><img src="<?=BASEIMAGES?>user.png" />Requisição</a>
    
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
   $titulo_page = 'AlmoXerife: Requisições';
  // page recebe o conteudo do buffer
  $page = ob_get_contents(); 

  //classe do controle 
  $class = '?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEW."base.php");