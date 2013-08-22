<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

session_start();

  if(!isset($_SESSION['session']['acoes']['idusuario'])){
      redirecionar('?action=cliente');
  }
    if(isset($_REQUEST['alterarL'])){//validação de formulário para alterar login
        
      if(isset($_REQUEST['newlogin'])?($_REQUEST['newlogin']== NULL? FALSE :TRUE):FALSE){
          
              $control = 'login';//controle no qual tem os metodos para login
              $action = 'alterarlogin';//ação
              
              $obt = new usuarioDAO();
              $ret = $obt->ObterPorPK($_SESSION['session']['acoes']['idusuario']);
              
              
              $_vals = array( 'newlogin' => $_REQUEST['newlogin'],
                              'idusu' => $_SESSION['session']['acoes']['idusuario']  
                  );
              $_SESSION['session']['acoes'] = $_vals;
              header("Location: ?control={$control}&action={$action}");
      }
      else{
          $_SESSION['session']['acoes']['msg'] = 'O campo login não foi informado!';
      }
          
  }

    if(isset($_REQUEST['alterarP'])){//validação de formulário para alterar permmissões
        $control = 'login';
        $action = 'alterarperm';        
        $perm = array();
                $i=0;
        foreach ($_REQUEST['menu'] as $ls){
                       $perm[$i]=$ls;
                       $i++;
           }
        $_vals = array( 'permissao'=> $perm,
                        'idusuario'=> $_SESSION['session']['acoes']['idusuario']);
         $_SESSION['session']['acoes'] = $_vals;
        redirecionar("?control={$control}&action={$action}");
                
    }
    if(isset($_REQUEST['alterarN'])){//validação de formulário para alterar Nome
        if(isset($_REQUEST['newnome'])?($_REQUEST['newnome']== NULL? FALSE :TRUE):FALSE){
          
              $control = 'login';//controle no qual tem os metodos para login
              $action = 'alterarnome';//ação
              
              $_vals = array( 'newnome' => $_REQUEST['newnome'],
                              'idusu' => $_SESSION['session']['acoes']['idusuario']  
                  );
              $_SESSION['session']['acoes'] = $_vals;
              redirecionar("?control={$control}&action={$action}");
      }
      else{
          $_SESSION['session']['acoes']['msg'] = 'O campo nome não foi informado!';
      }
    }
    if(isset($_REQUEST['alterarA'])){//validação de formulário para alterar adminitração
        
    }         
  
  ?>
<!--
	Início de conteúdo
-->
<div class="modulo">
	<h3>Editar usuário</h3>	
	
		<p>
			<strong>Dados do usuário</strong><br />
		</p>
                <?php 
                        $usu = $_SESSION['session']['acoes']['idusuario'];
                        
                        $usuario = new usuarioDAO();
                        $ret = $usuario->ObterPorPK($usu);
                ?>
		<p>
                    <strong>Login atual:</strong> <?=$ret->getLogin() ?>
		</p>
		<p>
                    <strong>Nome atual:</strong> <?=$ret->getNome() ?> 
		</p>
		<p>
                    <strong>É administrador ? </strong><?=$ret->getTipousuario_idtipousuario()==1 ? 'SIM':'NÃO' ?>
		</p>
                <form id="" action="" method="post" >
		<p>
			<strong>Novo Login</strong><br />
                        <input type="text" name="newlogin" />
		</p>
		<p>
                    <input type="submit" name="alterarL" value="Alterar Login" />
		</p>
                </form>
                <form method="post">
                <p>	
                        <strong>Novo nome</strong><br />
                        <input type="text" name="newnome" />
		</p>
		<p>
                    <input type="submit" name="alterarN" value="Alterar nome" />
		</p>
                </form>
                <form method="post">
		<p>
			<strong>É administrador?</strong><br />
                        <select>
                            <option></option>
                            <option value="1">SIM</option>
                            <option value="0">NÃO</option>
                        </select>
		</p>
		<p>
                    <input type="submit" name="alterarA" value="Alterar administração" />
		</p>
                </form>
                <form method="post">
                <p>
                    <strong>Permissões:</strong><br />
                    <?php
                   $vars = $_SESSION['session']['logado'];
                    //print_r($vars);
                    $vars = unserialize($vars);//disserializo o objeto armazenado na sessão
                    $menu = new menuClass();//crio um objeto para armazenar o objeto trazido pela sessão
                    $menu = $vars;//armazeno na variavel $menu o objeto trazido pela sessão
                    $permAtv = new permissaoDAO();
                    $retorn = $permAtv->ObterPorPK($ret->getIdusuario());
                    
                 
                    foreach ($menu as $ls){
                        $check ='';
                        foreach ($retorn as $lsp){
                           
                            if($lsp->getMenu_idmenu() == $ls->getIdmenu()){
                                $check = 'checked';
                                break;
                            }
                            else {
                                $check = '';
                            }
                          }
                            
                        echo "<p>
                              <input type='checkbox' name='menu[]' {$check} value='{$ls->getIdmenu()}'>{$ls->getNome()}<br>
                              </p>";
                                  
                               
                          //  }
                         }
                 ?>
                </p>
                <p>
                    <input type="submit" name="alterarP" value="Alterar permissões" />
                </p>
                </form>
                
	
</div>

<!--
	Fim de conteúdo
-->
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Editar usuario';
  // page recebe o conteudo do buffer
  $page = ob_get_contents(); 

  //classe do controle 
  $class = 'index.php?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEW."base.php");