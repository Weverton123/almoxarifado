<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
   seguranca_arq();
ob_start();

  session_cache_expire(0.1);
   session_start();
  
if(isset($_SESSION['session']['acoes']['idmaterial'])){
   unset($_SESSION['session']['acoes']['idmaterial']);//limpa sessão da memoria
}
   
 require_once (BASEMODEL.'conexaoBD.php');
 require_once (BASEMODELDAO.'materialDAO.php');
 //require_once (BASEMODELDAO.'categoriaDAO.php');
 
  if(isset($_REQUEST['editarMaterial'])){
      $id = $_REQUEST['editarMaterial'];
       $action  = 'editarmaterial';
              
       $_vals = array( 'idmaterial' => $id );
              
       $_SESSION['session']['acoes'] = $_vals;
                    
       redirecionar("?action={$action}");
   }
   if(isset($_REQUEST['deletarMaterial'])){
       $id = $_REQUEST['deletarMaterial'];
       $control = 'material';
       $action  = 'deletarmaterial';
              
       $_vals = array( 'idmaterial' => $id );
       
       $_SESSION['session']['acoes'] = $_vals;
       
       redirecionar("?control={$control}&action={$action}");
   }  
 
 
?>
<!--
	Início de conteúdo
-->
<a href="?action=cadastrarmaterial"><img src="<?=BASEIMAGES?>add_user.png" />Adicionar novo</a>
<div class="modulo">
	<h3>Listar Material</h3>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="usuario">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Detalhes</th>
                        <th>Quantidade</th>
                        <th>Grupo</th>
                        <th>Selecionar</th>
		</tr>
	</thead>
        <tbody>
        
        <?php 
               // $cat = new categoriaDAO(); //
              $mat = new materialDAO();
              $ret = $mat->ObterPorTodos();
              //print_r($ret);
              foreach ($ret as $ls){
                  //altera a cor da linha identificando que o produto está em falta ou proximo
                  $sitmaterial = ($ls->getQuantidadeatual() > 0 )? "class='gradeA'" : "class='gradeX'";
                  echo 
                      "<tr ". $sitmaterial ."  onClick='clicado(this);' 
                      onMouseOver='selecionado(this);' onMouseOut='n_selecionado(this);'>"
                      ."<td>{$ls->getNome()}</td>"
                      ."<td>{$ls->getDetalhes()}</td>"
                      ."<td>{$ls->getQuantidadeatual()}</td>"
                      ."<td>{$ls->getCategoria_idcategoria()}</td>"
                      ."<td class='center'>
                       <a href='?editarMaterial={$ls->getIdmaterial()}&action=material' title='Editar' ><img alt='editar' src='".BASEIMAGES."editar.png' /></a>
                       <a href='?deletarMaterial={$ls->getIdmaterial()}&action=material' title='Excluir' ><img alt='excluir' src='".BASEIMAGES."excluir.png' /></a>                   
                       </td>"
                      ."</tr>"
                              
                  ;
              }
        ?>
         
      </tbody>
</table>
</div>

<?php
 
?>
<!--
	Fim de conteúdo
-->
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: REQUISIÇÕES';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  //classe do controle 
  $class = '?action=';
  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once (BASEVIEWINC."requisicoes.php");