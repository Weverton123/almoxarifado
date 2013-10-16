<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página

  seguranca_arq();
  ob_start();
  
  session_start();
  
  
  
  //É utilizada uma outra forma de validação do formulário pelo php, apenas para garantir que a nova senha
  //será realmente a informada
  if(isset($_REQUEST['alterarS'])){
    
      if (isset($_REQUEST['senhaAt'])?($_REQUEST['senhaAt']== NULL? FALSE:TRUE):FALSE){
          if(isset($_REQUEST['senha'])?($_REQUEST['senha']== NULL? FALSE:TRUE):FALSE){
            if(isset($_REQUEST['newsenha'])?($_REQUEST['newsenha']== NULL? FALSE:TRUE):FALSE){
                if ($_REQUEST['senha'] == $_REQUEST['newsenha']){
                    
                $control = 'login';//controle no qual tem os metodos para login
                $action = 'alterarsenha';//ação
                $senha  = $_REQUEST['senhaAt'];//valor passado na requisição pelo formulario de login
                $newsenha = $_REQUEST['senha'];//valor passado na requisição pelo formulario de login 
                
                    $_vals = array(         'senha'=>$senha,
                                            'newsenha'=>$newsenha
                                 );      
                  $_SESSION['session']['acoes'] = $_vals;
                 header("Location: ?control={$control}&action={$action}");
                }
               else {
                   $_SESSION['session']['acoes']['msg'] = 'As senhas não conferem!';
                }
              }
            else {$_SESSION['session']['acoes']['msg'] = 'Todos os campos devem ser preenchidos!!!';}
          }
          else {$_SESSION['session']['acoes']['msg'] = 'Todos os campos devem ser preenchidos!!';}
      }
     else {
          $_SESSION['session']['acoes']['msg'] = 'Todos os campos devem ser preenchidos!';    
      }
      
      
  }
  
  if(isset($_REQUEST['alterarD'])){
      if(isset($_REQUEST['login'])?($_REQUEST['login']== NULL? FALSE :TRUE):FALSE){
          if (isset($_REQUEST['senhaAt'])?($_REQUEST['senhaAt']== NULL? FALSE:TRUE):FALSE){
          
              $control = 'login';//controle no qual tem os metodos para login
              $action = 'alterarlogin';//ação
                
              $_vals = array( 'newlogin' => $_REQUEST['login'],
                              'senha' => $_REQUEST['senhaAt']);
              $_SESSION['session']['acoes'] = $_vals;
              header("Location: ?control={$control}&action={$action}");
          }
          else {
              $_SESSION['session']['acoes']['msg'] = 'A senha deve ser informada para confirmação!';
          }
      }
      else{
          $_SESSION['session']['acoes']['msg'] = 'O campo login não foi informado!';
      }
          
  }

?>
<!--
	Início de conteúdo
-->
<h2>Minha área</h2>

<div class="modulo">
	<h3>Meus dados</h3>
        <?php  if(isset($_SESSION['session']['usuario'])){
     
                $usu = $_SESSION['session']['usuario'];
                $usu = unserialize($usu);
                $usuario = new usuarioClass();
                $usuario = $usu;
            ?>
	<p>
            <strong>Login:</strong>  <?= $usuario->getLogin() ?> 
	</p>
	<p>
            <strong>Nome:</strong>   <?= $usuario->getNome() ?>
	</p>
        
	<p>
            <strong>Setor:</strong>  <?= $usuario->getSetor_idsetor() ?>
	</p>
        <?php } 
            else {
                echo 'Falha no carregamento do usuario!';
            }
        ?>
</div>
		
<div class="modulo">
	<h3>Minhas últimas requisições</h3>	
</div>

<div class="modulo">
	<h3>Alterar meus dados</h3>
        <form id="" action="" method="post">
		<p>
			<strong>Login</strong><br />
                        <input type="text" name="login" value="" />
		</p>
                <p>
			<strong>Senha atual</strong><br />
                        <input type="password" name="senhaAt"  />
		</p>
		<p>
                    <input type="submit" name="alterarD" value="Alterar dados" />
		</p>
		<p>
			*O setor pode ser alterado somente pelo administrador deste sistema. Se necessário, solicite através do menu Fale Conosco.
		</p>
	</form>
</div>

<div class="modulo">
	<h3>Alterar minha senha</h3>	
        <form id="" action="" method="post">
		<p>
			<strong>Senha atual</strong><br />
                        <input type="password" name="senhaAt"  />
		</p>
		<p>
			<strong>Nova senha</strong><br />
                        <input type="password" id="senha" name="senha"  />
		</p>
		<p>
			<strong>Confirmação da nova senha</strong><br />
                        <input type="password" id="newsenha" name="newsenha" />
		</p>
		<p>
                    <input type="submit" name="alterarS" value="Alterar senha" />
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
  $class = '?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEW."base.php");