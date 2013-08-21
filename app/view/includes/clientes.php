<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
  seguranca_arq();
  require_once (BASEMODEL.'conexaoBD.php');
  require_once (BASEMODELDAO.'setorDAO.php');
  
   session_start();
   
  if(isset($_REQUEST['inserts'])){
      
      if(isset($_POST['setor'])? ($_POST['setor'] !=NULL ? TRUE : FALSE):FALSE){
         
              $control = 'setor';
              $action  = 'inserir';
              $setor   = $_REQUEST['setor'];
              $_vals = array(              'control'=>$control,
                                           'action'=>$action,
                                           'setor'=>$setor
                                 );      
              $_SESSION['session']['acoes'] = $_vals;
                    
            header("Location: ?control={$control}&action={$action}");
      }
      else{
         $_SESSION['session']['acoes']['msg'] = 'O setor deve ser informado!';
          //header('Location: ?action=cliente');
      }
          
  }  
  
               
  if(isset($_REQUEST['criarUsu'])){
      if(isset($_REQUEST['nome'])?($_REQUEST['nome']== NULL ? FALSE :TRUE):FALSE){
        if(isset($_REQUEST['login'])?($_REQUEST['login']== NULL ? FALSE :TRUE):FALSE){
           if(isset($_REQUEST['senha'])?($_REQUEST['senha']== NULL ? FALSE :TRUE):FALSE){
                $adm =  isset($_REQUEST['adm'])?($_REQUEST['adm']== '1' ? 1 : 0): 0;
                $perm = array();
                $i=0;
                if(isset($_REQUEST['menu'])){
                    foreach ($_REQUEST['menu'] as $ls){
                        $perm[$i]=$ls;
                        $i++;
                    }
                } 
              $control = 'login';
              $action  = 'cadastrar';
              $nome   = $_REQUEST['nome'];
              $login = $_REQUEST['login'];
              $senha = $_REQUEST['senha'];
              $setor = $_REQUEST['setorCadas'];
              /*
              $_vals = array(           'nome'=>$nome,
                                        'login'=>$login,
                                        'senha'=>$senha,    
                                        'setor'=>$setor,
                                        'tipousu'=>$adm,
                                        'permissao'=>$perm
                                 );      
              $_SESSION['session']['acoes'] = $_vals;
                    
            header("Location: ?control={$control}&action={$action}");
               // $_SESSION['session']['acoes']['msg'] = $adm;
                */
              $usu = new usuarioClass();
              $usu->setLogin($login);
              $usu->setNome($nome);
              $usu->setSenha($senha);
              $usu->setSetor_idsetor($setor);
              $usu->setTipousuario_idtipousuario($adm);
              $usus = new usuarioDAO();
              $ret = $usus->incluir($usu);
              if ($ret){
                  echo 'gravado com sucesso';
              }
              else {
                  echo 'falhaSs';
              }
             }
             else{
                $_SESSION['session']['acoes']['msg'] = 'O campo senha não foi informado!'; 
                }
          }
        else{
             $_SESSION['session']['acoes']['msg'] = 'O campo login não foi informado!'; 
        }   
      }
      else{
         $_SESSION['session']['acoes']['msg'] = 'O campo nome não foi informado!'; 
      }
   }

  
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
<!--
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
-->
<div class="modulo">
	<h3>Listar usuários</h3>   
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="usuario">
	<thead>
		<tr>
			<th>Login</th>
			<th>Nome</th>
			<th>Setor</th>
                        <th>Selecionar</th>
		</tr>
	</thead>
        <tbody>
        <form id="" action="" method="post">
        <?php $usuario = new usuarioDAO();
              $ret = $usuario->ObterPorTodos();  
              
              foreach ($ret as $ls){
                  echo "<tr class='gradeA' onClick='clicado(this);' 
                      onMouseOver='selecionado(this);' onMouseOut='n_selecionado(this);'>"
                      ."<td>{$ls->getLogin()}</td>"
                      ."<td>{$ls->getNome()}</td>"
                      ."<td>{$ls->getSetor_idsetor()}</td>"
                      ."<td class='center'>
                       <input type='submit' name='editarUsu' value='Editar' />
                       <input type='submit' name='deletarUsu' value='Deletar' /></td>"
                      ."</tr>"
                  ;
              }
        ?>
        </form>
      </tbody>
</table>
       
</div>
<div class="modulo">
	<h3>Inserir usuário</h3>	
        <form id="" method="post" action="">
		<p>
			<strong>Login</strong><br />
                        <input type="text" name="login" value="" />
		</p>
		<p>
			<strong>Nome</strong><br />
                        <input type="text" name="nome" value="" />
		</p>
		<p>
			<strong>Senha</strong><br />
                        <input type="password" name="senha" value="" />
		</p>
                <p>
                    <strong>Selecione o setor</strong><br />
                    <select name="setorCadas">
				<option value="" selected>Selecione o setor</option>
				<?php
                                    $listaSetor = new setorDAO();
                                    $list = $listaSetor->ObterPorTodos();
                                    foreach ($list as $ls){
                                        echo "<option value='{$ls->getIdsetor()}'>{$ls->getNome()}</option>";
                                    }
                                    
                                ?>
			</select>
                </p>
		<p>
                    <input type="checkbox" name="adm" value="1">Este usuário é administrador?<br>
		</p>
                <p>
                    <strong>Selecione as páginas que o usuário poderá ter acesso:</strong>
                </p>
                <?php
                    if (isset($val)) {
                     $i=1;
                       foreach ($val as $ls){
                       echo "<p>
                              <input type='checkbox' name='menu[]' value='{$ls->getIdmenu()}'>{$ls->getNome()}<br>
                            </p>";
                          $i++;
                         }
                      }
                   else {
                        echo 'Falha no carregamento do menu!';
                        }
                ?>
		<p>
                    <input type="submit" name="criarUsu" value="Inserir usuário" />
		</p>
	</form>
</div>
<!--
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
-->
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