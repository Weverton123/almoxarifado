<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
  
    
    if(isset($_REQUEST['validar'])){ 
         if(isset($_REQUEST['username']) && isset($_REQUEST['password']) ? ($_REQUEST['username']== NULL ||$_REQUEST['password']==NULL
             ? FALSE :TRUE):FALSE){ 
             
                $control = 'login';//controle no qual tem os metodos para login
                $action = 'validar';//ação na qual realiza a verificação e validação do usuario
                $user  = $_REQUEST['username'];//valor passado na requisição pelo formulario de login
                $senha = $_REQUEST['password'];//valor passado na requisição pelo formulario de login 
                
                    $_vals = array(         'control'=>$control,
                                            'action'=>$action,
                                            'user'=>$user,
                                            'senha'=>$senha
                                 );
               session_start();   
               $_SESSION['session'] = $_vals;
                
                    
               redirecionar("?control={$control}&action={$action}");
          }
           else{
           echo 'Todos os campos devem ser preenchidos!'; 
          }
  }

 
  
  
  
      
  
 
  ?>
<!--
	Início de conteúdo
-->
<form class="login" action='' method="post">
	<label for="username">Usuário</label>
	<input type="text" id="username" name="username">
	<br>
    <label for="password">Senha</label>&nbsp;&nbsp;&nbsp;
	<input type="password" id="password" name="password">
	<br>
	<input type="submit" name="validar" value="Entrar" />
	<br>
	<p><a href="?action=<?=$class ?>faleconosco">Esqueci minha senha</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?action=<?=$class ?>faleconosco">Cadastrar um novo usuário</a></p>
</form>
<!--
	Fim de conteúdo
-->
<?php

   //titulo da pagina
   $titulo_page = 'AlmoXerife: Login';	
  // page recebe o conteudo do buffer
  $page = ob_get_contents(); 
  
  //classe do controle 
  $class = '?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEW."base.php");
