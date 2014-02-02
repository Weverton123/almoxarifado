<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
   seguranca_arq();

  
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
        
        <?php /*
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
              }*/
        ?>
         
      </tbody>
</table>
</div>

<!--
	Fim de conteúdo
-->