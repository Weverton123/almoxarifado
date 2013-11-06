<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

session_start();

 require_once (BASEMODEL.'conexaoBD.php');
 require_once (BASEMODELDAO.'materialDAO.php');
 
  if(isset($_REQUEST['cadastrarR'])){
      echo 'chegou';
     $nome  = $_REQUEST['nome'];
     $grupo = $_REQUEST['grupo'];
     $qnt   = $_REQUEST['qnt'];         
     
     $control = 'requisicao';
     $action  = 'cadastrar';
              $_vals = array(    'nomeR' => $nome,
                                 'grupoR'=> $grupo,
                                 'qntR'  => $qnt  
                  );
                 // print_r($_vals);       
              $_SESSION['session']['acoes'] = $_vals;
              
             redirecionar("?control={$control}&action={$action}"); 
    
    }
 // else{ echo 'Falha ao tentar adicionar material!';}  
if(isset($_REQUEST['limparM'])){
    unset($_SESSION['session']['acoes']['listaproduto']);
}
    
?>

		
<div class="modulo">
	<h3>Nova Requisição</h3>
        
         <table cellpadding="0" cellspacing="0" border="0" class="display" id="usuario">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Detalhes</th>
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
                  echo 
                      "<tr class='gradeA onClick='clicado(this);' 
                      onMouseOver='selecionado(this);' onMouseOut='n_selecionado(this);'>"
                      ."<td>{$ls->getNome()}</td>"
                      ."<td>{$ls->getDetalhes()}</td>"
                      ."<td>{$ls->getCategoria_idcategoria()}</td>"
                      ."<td class='add'>
                                          
                       </td>"
                      ."</tr>"
                  ;
              }
        ?>
        
      </tbody>
       
</table>
    
</form>
  
</div>
<div id="produto" class="prod">
    <form action="" method="POST">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="usuario">
        <thead>
            <th>Nome Produto</th>
            <th>Grupo</th>
            <th>Quantidade</th>
            <th>Remover</th>
        </thead> 
        <tbody class="material"></tbody>
        
    </table>
         <input type="submit" name="cadastrarR" value="Cadastrar Requisição" />
    </form>     
</div>        



<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: ADD::Setores';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."requisicoes.php");