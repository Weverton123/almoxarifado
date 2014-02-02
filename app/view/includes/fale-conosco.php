<?php
if(!defined('BASEPATH')) exit('Falha no carregamento do script!');  

?>
<!--
	Início de conteúdo
-->
<h2>Fale conosco</h2>
<p>
	Para solicitar cadastramento de novo usuário, dirimir dúvidas, fazer crítica, elogio ou sugestão, preencha este formulário e nos envie uma mensagem.
</p>
<div id="faleconosco">
	<form id="send" action="">
		<p>
			<label for="name">Nome</label><br />
			<input id="name" type="text" name="name" value="" />
		</p>
		<p>
			<label for="email">E-mail</label><br />
			<input id="email" type="text" name="email" value="" />
		</p>
		<p>
			<label for="profile">Mensagem</label><br />
			<textarea name="profile" id="profile" cols="30" rows="10"></textarea>
		</p>
		<p>
			<input type="submit" name="enviar" value="Enviar" />
		</p>
	</form>
</div>
<!--
	Fim de conteúdo
-->
