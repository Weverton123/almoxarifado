<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
 
?>
<!--
	Início de conteúdo
-->
<h2>Clientes</h2>

<div id="botoes">
    <a href="setor"><img src="<?=BARRA.url_base.BARRA.BASEIMAGES?>setor.png" />Setores</a>
    <a href="usuario"><img src="<?=BARRA.url_base.BARRA.BASEIMAGES?>user.png" />Usuários</a>
</div>

<?php
    if(isset($conteudo)){ echo $conteudo;}
    else { echo 'Selecione algum menu!';}
?>
<!--
	Fim de conteúdo
-->