<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();

?>
<!--
	Início de conteúdo
-->
<h2>Minha área</h2>

<div class="modulo">
	<h3>Meus dados</h3>
	<p>
		<strong>Login:</strong> marcel
	</p>
	<p>
		<strong>Nome:</strong> Marcel Gleidson Bezerra de Freitas
	</p>
	<p>
		<strong>E-mail:</strong> marcel@bczm.ufrn.br
	</p>	
	<p>
		<strong>Setor:</strong> Seção de Suporte Técnico
	</p>
</div>
		
<div class="modulo">
	<h3>Minhas últimas requisições</h3>	
</div>

<div class="modulo">
	<h3>Alterar meus dados</h3>
	<form id="" action="">
		<p>
			<strong>Login</strong><br />
			<input type="text" value="" />
		</p>
		<p>
			<strong>Nome</strong><br />
			<input type="text" value="" />
		</p>
		<p>
			<strong>E-mail</strong><br />
			<input type="text" value="" />
		</p>
		<p>
			<input type="submit" value="Alterar dados" />
		</p>
		<p>
			*O setor pode ser alterado somente pelo administrador deste sistema. Se necessário, solicite através do menu Fale Conosco.
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Alterar minha senha</h3>	
	<form id="" action="">
		<p>
			<strong>Senha atual</strong><br />
			<input type="password" />
		</p>
		<p>
			<strong>Nova senha</strong><br />
			<input type="password" />
		</p>
		<p>
			<strong>Confirmação da nova senha</strong><br />
			<input type="password" />
		</p>
		<p>
			<input type="submit" value="Alterar senha" />
		</p>
	</form>
</div>

<!--
	Fim de conteúdo
-->
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Minha área';
  // page recebe o conteudo do buffer
  $page = ob_get_contents(); 

  //classe do controle 
  $class = 'index.php?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include(BASEVIEW."base.php");