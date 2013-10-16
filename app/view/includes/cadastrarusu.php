<?php if(!defined('BASEPATH')) exit(header('Location: ./../../index.php'));
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

  require_once (BASEMODEL.'conexaoBD.php');
  require_once (BASEMODELDAO.'setorDAO.php');
session_start();

  if(isset($_REQUEST['criarUsu'])){
      if(isset($_REQUEST['nome']) && $_REQUEST['nome']!= NULL ? TRUE : FALSE){
        if(isset($_REQUEST['login'])&& $_REQUEST['login']!= NULL ? TRUE :FALSE){
           if(isset($_REQUEST['senha'])&& $_REQUEST['senha']!= NULL ? TRUE :FALSE){
               if(isset($_REQUEST['setorCadas'])&& $_REQUEST['setorCadas']!= '-1' ? TRUE : FALSE){
                $adm =  isset($_REQUEST['adm'])&& $_REQUEST['adm']== '1' ? 1 : 2;
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
              
              $_vals = array(           'nome'=>$nome,
                                        'login'=>$login,
                                        'senha'=>$senha,    
                                        'setor'=>$setor,
                                        'tipousu'=>$adm,
                                        'permissao'=>$perm
                                 );      
              $_SESSION['session']['acoes'] = $_vals;
                    
              redirecionar("?control={$control}&action={$action}");
               // $_SESSION['session']['acoes']['msg'] = $adm;
                }
                else {
                  $_SESSION['session']['acoes']['msg'] = 'O setor deve ser informado!';
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
				<option value="-1" selected>Selecione o setor</option>
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
                
                    
                     
                    $vars = $_SESSION['session']['logado'];
                    //print_r($vars);
                    $vars = unserialize($vars);//disserializo o objeto armazenado na sessão
                    $menu = new menuClass();//crio um objeto para armazenar o objeto trazido pela sessão
                    $menu = $vars;//armazeno na variavel $menu o objeto trazido pela sessão
                    
                    foreach ($menu as $ls){
                      if($ls->getLink() == 'logoff' || $ls->getLink() == 'minhaarea'){  
                       echo "<p>
                              <input type='checkbox' name='menu[]' checked  value='{$ls->getIdmenu()}'>{$ls->getNome()}<br>
                            </p>";
                          }
                     else{
                       echo "<p>
                             <input type='checkbox' name='menu[]' value='{$ls->getIdmenu()}'>{$ls->getNome()}<br>
                            </p>";
                         }    
                     }

                     
                ?>
		<p>
                    <input type="submit" name="criarUsu" value="Inserir usuário" />
		</p>
	</form>
</div>

<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: ADD::Usuario';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once (BASEVIEWINC."clientes.php");