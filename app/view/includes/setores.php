<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
//  seguranca_arq();

  require_once (BASEMODEL.'conexaoBD.php');
  require_once (BASEMODELDAO.'setorDAO.php');
  
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
  
?>

<div class="modulo">
	<h3>Listar setores</h3>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="usuario">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Código</th>
                        <th>Selecionar</th>
		</tr>
	</thead>
        <tbody>
        
        <?php $setor = new setorDAO();
              $ret = $setor->ObterPorTodos();  
              foreach ($ret as $ls){
                  echo 
                      "<tr class='gradeA' onClick='clicado(this);' 
                      onMouseOver='selecionado(this);' onMouseOut='n_selecionado(this);'>"
                      ."<td>{$ls->getNome()}</td>"
                      ."<td>{$ls->getIdsetor()}</td>"
                      ."<td class='center'>
                       <a href='?editarUsu={$ls->getIdsetor()}&action=setor' title='Editar' ><img alt='editar' src='".BASEIMAGES."editar.png' /></a>
                       <a href='?deletarUsu={$ls->getIdsetor()}&action=setor' title='Excluir' ><img alt='excluir' src='".BASEIMAGES."excluir.png' /></a>                   
                       </td>"
                      ."</tr>"
                              
                  ;
              }
        ?>
         
      </tbody>
</table>
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
<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Setores';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."clientes.php");