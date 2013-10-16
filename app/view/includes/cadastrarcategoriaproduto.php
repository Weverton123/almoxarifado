<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

session_start();


  if(isset($_REQUEST['insertCP'])){
      
      if(isset($_REQUEST['categorianame'])&& $_REQUEST['categorianame'] != NULL ? TRUE : FALSE){
         
              $control = 'material';
              $action  = 'inserircategoria';
              $_vals = array(    'categorianame'=>$_REQUEST['categorianame'] );      
              $_SESSION['session']['acoes'] = $_vals;
              
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
			<strong>Nome Grupo:</strong><br />
                        <input type="text" name="categorianame" value="" />
		</p>
                <p>
                    <input type="submit" name="insertCP" value="Inserir Categoria" />
		</p>
	</form>
</div>


<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: ADD::Grupos';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."requisicoes.php");