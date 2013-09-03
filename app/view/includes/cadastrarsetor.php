<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
//seguranca_arq();  
ob_start();

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
?>

		
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
   $titulo_page = 'AlmoXerife: ADD::Setores';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."clientes.php");