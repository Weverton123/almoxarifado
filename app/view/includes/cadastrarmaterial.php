<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

  require_once (BASEMODEL.'conexaoBD.php');
  require_once (BASEMODELDAO.'categoriaDAO.php');

session_start();


  if(isset($_REQUEST['insertM'])){
      
      if(isset($_REQUEST['materialname'])&& $_REQUEST['materialname'] != NULL ? TRUE : FALSE){
        if(isset($_REQUEST['materialQnt'])&& $_REQUEST['materialQnt'] != NULL ? TRUE : FALSE){   
           if(isset($_REQUEST['materialgrupo'])&& $_REQUEST['materialgrupo'] != NULL ? TRUE : FALSE){   
              if(isset($_REQUEST['materialDetalhes'])&& $_REQUEST['materialDetalhes'] != NULL ? TRUE : FALSE){
         
         
              $control = 'material';
              $action  = 'cadastrar';
              $_vals = array(    'materialname'=>$_REQUEST['materialname'],
                                 'materialqnt'=>$_REQUEST['materialQnt'],
                                 'materialgrupo'=>$_REQUEST['materialgrupo'],
                                 'materialdetalhes'=>$_REQUEST['materialDetalhes']
                      );      
              $_SESSION['session']['acoes'] = $_vals;
              //print_r($_vals);
              redirecionar("?control={$control}&action={$action}");
              $_SESSION['session']['acoes']['msg'] = '';
            
                }
                else{erro_campo_vazio(); }
              }
            else{erro_campo_vazio(); }
        }
        else{erro_campo_vazio();}
      }
      else{erro_campo_vazio();}
          
  }//if insertM

?>

		
<div class="modulo">
	<h3>Cadastrar Material</h3>
        <form  action="" method="post">
		<p>
			<strong>Nome:</strong><br />
                        <input type="text" name="materialname" value="" />
		</p>
                <p>
			<strong>Quantidade:</strong><br />
                        <input type="number" name="materialQnt" value="" style="width:340px;height:30px; text-align:center; " />
		</p>
                <p>
			<strong>Grupo:</strong><br />
                        
                        <select name="materialgrupo" value="" style="width:340px;  " >
                            <option value="-1" selected>Selecione o grupo</option>
				<?php
                                    $listaCat = new categoriaDAO();
                                    $list = $listaCat->ObterPorTodos();
                                    foreach ($list as $ls){
                                        echo "<option value='{$ls->getIdcategoria()}'>{$ls->getNome()}</option>";
                                    }
                                    
                                ?>
                        </select>
		</p>
                <p>
			<strong>Detalhes:</strong><br />
                        <textarea name="materialDetalhes" style="width:340px;height:100px;  " ></textarea>
		</p>
                <p>
                    <input type="submit" name="insertM" value="Cadastrar Material" />
		</p>
	</form>
</div>


<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: ADD::Material';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."requisicoes.php");