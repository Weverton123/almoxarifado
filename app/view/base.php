<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!'); ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE HTML>
<html>

<head>
	<title><?php if(isset($titulo_page)) echo $titulo_page; ?></title>
	<meta name="description" content="AlmoXerife - Sistema de almoxarifado da Biblioteca Central Zila Mamede" />
	<meta name="keywords" content="almoXerife, almoxarifado, biblioteca central zila mamede, bczm" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="pt-br">
	<meta name="author" content="Sessão de Suporte Técnico da Biblioteca Central Zila Mamede, Ítalo Patrício, Marcel de Freitas">
	<meta name="reply-to" content="sst@bczm.ufrn.br">
	<meta name="robots" content="index,follow"><!--indexar página e seus links-->
	<meta name="robots" content="archive"><!--arquivar no cache dos buscadores-->
  
  <!--ESTILOS IRÃO FICAR DINÂMICOS-->
 
  <?php 
        if(file_exists(BASECSS.'css.php'))
         require_once (BASECSS.'css.php');    
        if(file_exists(BASEJS.'js.php'))
         require_once (BASEJS.'js.php');
  ?>


</head>

<body>
    <?php 
    
       ?>
	<div id="main">
		<div id="header">
			<div id="logo">
				<a href="http://www.bczm.ufrn.br" target="blank"><img src="<?=BASEIMAGES ?>logo-sisbi.png" alt="Logomarca do SISBI" /></a>
				<div class="unidade">Biblioteca Central Zila Mamede</div>
				<div id="almoxerife">
					<h1>Almo<a href="index">Xerife</a></h1>
					<span>Sistema de almoxarifado</span>
				</div>
			</div>
			<div id="menubar">
				<ul id="menu">
					<!--  -->
                                        <?php
                                         if (isset($val)) {
                                          foreach ($val as $row){
                                            //<li class="current"><a href="<?=$class>index">Entrar</a></li>
					
                                          //echo $row->getNome().'/'.$row->getLink().'<br>';
                                           echo '<li class="current"><a href="'.$class.$row->getlink().'">'.$row->getNome().'</a></li>';
                                             }
                                          }
                                        else {
                                              echo 'Falha no carregamento do menu!';
                                        }
                                        ?>
                                        

                                </ul>
			</div>
		</div>
		<div id="site_content">
			<!--<div id="sidebar_container">
				<img class="paperclip" src="style/paperclip.png" alt="paperclip" />
				<div class="sidebar">
					<h3>T&iacute;tulo da not&iacute;cia</h3>
					<h4>Subt&iacute;tulo da not&iacute;cia</h4>
					<h5>Data da informa&ccedil;&atilde;o</h5>
					<p>Conte&uacute;do com alguma not&iacute;cia ou alguma informa&ccedil;&atilde;o.</p>
				</div>
			</div>-->
			<div id="content">
                                <!-- Área para mensagem retornada de erro ou aviso  -->
                                <?php
                                    if(isset($_SESSION['session']['msg'])) echo $_SESSION['session']['msg'];
                                    else if(isset($_SESSION['session']['acoes']['msg']))
                                        echo $_SESSION['session']['acoes']['msg'];
                                   
                                ?>
				<!-- inserir conteudo da pagina aqui -->
				<?php
					if(isset($page)) echo $page; 
						else echo $page = 'NENHUMA PÁGINA FOI CARREGADA!'; 
				?>
			</div>
		</div>
		<div id="footer">
			<p>Todos os direitos reservados à  <a href="http://www.bczm.ufrn.br/" target="blank">Biblioteca Central Zila Mamede</a></p>
			<p>Desenvolvido pela <a href="mailto:sst@bczm.ufrn.br" target="blank">Sessão de Suporte Técnico</a></p>
		</div>
	</div>
        <div id="top"><img src="<?=BASEIMAGES ?>subir.png" alt="Subir ao topo da página"  title="Ir ao topo"/></div>
</body>
</html>

