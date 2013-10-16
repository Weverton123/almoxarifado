<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();
session_cache_expire(0.1);
session_start();


  if(isset($_REQUEST['insertS'])){
      
      if(isset($_REQUEST['setorname']) && $_REQUEST['setorname'] != NULL ? TRUE :FALSE||
         isset($_REQUEST['setorcod'])&& $_REQUEST['setorcod'] !=NULL ? TRUE :FALSE 
          ){
         
              $control = 'setor';
              $action  = 'inserir';
              $_vals = array(    'setorname'=>$_REQUEST['setorname'],
                                 'setorcod'=>$_REQUEST['setorcod'] );      
              $_SESSION['session']['acoes'] = $_vals;
              //echo $_vals['setorname'].' '.$_vals['setorcod'];      
              redirecionar("?control={$control}&action={$action}");
      }
      else{
         $_SESSION['session']['acoes']['msg'] = 'Todos os campos devem ser preenchidos!';
         redirecionar('?');
      }
          
  }  
?>

		
<div class="modulo">
	<h3>Inserir setor</h3>
        <form  action="" method="post">
		<p>
			<strong>Nome do setor</strong><br />
                        <input type="text" name="setorname" value="" />
		</p>
                <p>
			<strong>Código do setor</strong><br />
                        <input type="text" name="setorcod" value="" />
		</p>
		<p>
                    <input type="submit" name="insertS" value="Inserir setor" />
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