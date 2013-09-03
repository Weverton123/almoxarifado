<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
//  seguranca_arq();

  require_once (BASEMODEL.'conexaoBD.php');
  require_once (BASEMODELDAO.'setorDAO.php');
  
  
?>

<a href="?action=cadastrarusu"><img src="<?=BASEIMAGES?>add_user.png" />Adicionar novo</a>
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
                      ."<td>{$ls->getCodigo()}</td>"
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

<?php
   // titulo pagina
   $titulo_page = 'AlmoXerife: Setores';
  // page recebe o conteudo do buffer
  $conteudo = ob_get_contents(); 

  
  // Descarta o conteudo do Buffer
  ob_end_clean(); 
  //Include com o Template
  include_once(BASEVIEWINC."clientes.php");