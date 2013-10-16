<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
   seguranca_arq();
ob_start();

  
   session_start();
   
 
?>
<!--
	Início de conteúdo
-->
<h3>Requisição</h3>


<?php
 
?>
<!--
	Fim de conteúdo
-->
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: REQUISIÇÕES';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  //classe do controle 
  $class = '?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."requisicoes.php");