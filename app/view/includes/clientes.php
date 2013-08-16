<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
  seguranca_arq();
  
  if(isset($_REQUEST['inserts'])){
      
      if(isset($_POST['setor'])? ($_POST['setor'] !=NULL ? TRUE : FALSE):FALSE){
          session_start();
              $control = 'setor';
              $action  = 'inserir';
              $setor   = $_REQUEST['setor'];
             $_vals = array(               'control'=>$control,
                                           'action'=>$action,
                                           'setor'=>$setor
                                 );      
               $_SESSION['session'] = $_vals;
                
                    
               header("Location: ?control={$control}&action={$action}");
      }
      else{
         $erro = 'O setor deve ser informado!';
          //header('Location: ?action=cliente');
      }
          
  }  
  if(isset($erro))
      $erro = $erro!=NULL ? $erro :'' ;
      echo $erro;
  
?>
<!--
	Início de conteúdo
-->
<h2>Clientes</h2>

<div id="botoes">
	<a href="#">Listar setores</a>
	<a href="#">Inserir setor</a>
	<a href="#">Editar setor</a>
	<a href="#">Remover setor</a>
	<a href="#">Listar usuários</a>
	<a href="#">Inserir usuário</a>
	<a href="#">Editar usuário</a>
	<a href="#">Remover usuário</a>
</div>

<div class="modulo">
	<h3>Listar setores</h3>
</div>
		
<div class="modulo">
	<h3>Inserir setor</h3>
        <form  action="" method="post">
		<p>
			<strong>Nome do setor</strong><br />
                        <input type="text" name="setor" value="" />
		</p>
		<p>
                    <input type="submit" name="inserts" value="Inserir setor" />
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Editar setor</h3>
	<form id="">
		<p>
			<strong>Selecione o setor</strong><br />
			<select>
				<option value="" selected></option>
				<option value="1">Seção de Suporte Técnico</option>
				<option value="9">Secretaria</option>
				<option value="2">Repositórios Digitais</option>
			</select>
		</p>
		<p>
			<strong>Novo nome</strong><br />
			<input type="text" name="novoNome" value="" />
		</p>
		<p>
			<input type="submit" value="Alterar nome" />
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Remover setor</h3>
	<form>
		<p>
			<strong>Selecione o setor</strong><br />
			<select>
				<option value="" selected></option>
				<option value="1">Seção de Suporte Técnico</option>
				<option value="9">Secretaria</option>
				<option value="2">Repositórios Digitais</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Remover setor" />
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Listar usuários</h3>	
</div>

<div class="modulo">
	<h3>Inserir usuário</h3>	
	<form id="">
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
			<input type="checkbox" value="administrador">Este usuário é administrador?<br>
		</p>
		<p>
			<input type="submit" value="Inserir usuário" />
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Editar usuário</h3>	
	<form>
		<p>
			<strong>Selecione o usuário</strong><br />
			<select>
				<option value="" selected></option>
				<option value="1">Marcel Gleidson Bezerra de Freitas</option>
				<option value="9">Jânio César</option>
				<option value="2">Márcio Peixoto</option>
			</select>
		</p>
		<p>
			<strong>Login atual:</strong> marcel
		</p>
		<p>
			<strong>Nome atual:</strong> Marcel Gleidson Bezerra de Freitas
		</p>
		<p>
			<strong>E-mail atual:</strong> marcel@bczm.ufrn.br
		</p>
		<p>
			<strong>É administrador?</strong> Não
		</p>
		<p>
			<strong>Novo login</strong><br />
			<input type="text" value="" />
		</p>
		<p>
			<input type="submit" value="Alterar login" />
		</p>
		<p>
			<strong>Novo nome</strong><br />
			<input type="text" value="" />
		</p>
		<p>
			<input type="submit" value="Alterar nome" />
		</p>
		<p>
			<strong>Novo e-mail</strong><br />
			<input type="text" value="" />
		</p>
		<p>
			<input type="submit" value="Alterar e-mail" />
		</p>
		<p>
			<strong>É administrador?</strong><br />
			<input type="radio" value="sim">Sim<br />
			<input type="radio" value="nao">Não
		</p>
		<p>
			<input type="submit" value="Alterar administração" />
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Remover usuário</h3>
	<form>
		<p>
			<strong>Selecione o usuário</strong><br />
			<select>
				<option value="" selected></option>
				<option value="1">Marcel Gleidson Bezerra de Freitas</option>
				<option value="9">Wellington</option>
				<option value="2">Zaira Atanásio</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Remover usuário" />
		</p>
	</form>
</div>

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