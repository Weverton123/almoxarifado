<?php   if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();
ob_start();
session_cache_expire(0.1);
session_start();

if(isset($_SESSION['session']['acoes']['idusuario'])){
     unset($_SESSION['session']['acoes']['idusuario']);//limpa sessão da memoria
 }
 
  require_once (BASEMODEL.'conexaoBD.php');
  require_once (BASEMODELDAO.'setorDAO.php');
  
 
   
   if(isset($_REQUEST['editarUsu'])){
      $id = $_REQUEST['editarUsu'];
       $action  = 'editarusu';
              
       $_vals = array( 'idusuario' => $id );
              
       $_SESSION['session']['acoes'] = $_vals;
                    
       redirecionar("?action={$action}");
   }
   if(isset($_REQUEST['deletarUsu'])){
       $id = $_REQUEST['deletarUsu'];
       $control = 'login';
       $action  = 'deletarusu';
              
       $_vals = array( 'idusuario' => $id );
       
       $_SESSION['session']['acoes'] = $_vals;
       
       redirecionar("?control={$control}&action={$action}");
   }  
   
?>

<a href="?action=cadastrarusu"><img src="<?=BASEIMAGES?>add_user.png" />Adicionar novo</a>
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
        
        <?php $usuario = new usuarioDAO();
              $ret = $usuario->ObterPorTodos();  
              foreach ($ret as $ls){
                  echo 
                      "<tr class='gradeA' onClick='clicado(this);' 
                      onMouseOver='selecionado(this);' onMouseOut='n_selecionado(this);'>"
                      ."<td>{$ls->getLogin()}</td>"
                      ."<td>{$ls->getNome()}</td>"
                      ."<td>{$ls->getSetor_idsetor()}</td>"
                      ."<td class='center'>
                       <a href='?editarUsu={$ls->getIdusuario()}&action=usuario' title='Editar' ><img alt='editar' src='".BASEIMAGES."editar.png' /></a>
                       <a href='?deletarUsu={$ls->getIdusuario()}&action=usuario' title='Excluir' ><img alt='excluir' src='".BASEIMAGES."excluir.png' /></a></td>"
                      ."</tr>"
                              
                  ;
              }
        ?>
         
      </tbody>
</table>
       
</div>

<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Usuarios';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once (BASEVIEWINC."clientes.php");