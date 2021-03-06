<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
#seguranca_arq();  

         foreach ($val as $array) {
           foreach ($array as $key => $value) {
                   if( $key == 'usuario'   )   $usuario = ($value);
                   if( $key == 'menus_actions') $menus_actions=($value);
                   if( $key == 'permissoes') $permissoes = ($value); 
           }         
         } 
?>
<!--
	Início de conteúdo
-->
<div class="modulo">
	<h3>Editar usuário</h3>	
	
		<p>
			<strong>Dados do usuário</strong><br />
		</p>
                <?php 
                        
                ?>
		<p>
                    <strong>Login atual:</strong> <?=$usuario[0]['login'] ?> 
		</p>
		<p>
                    <strong>Nome atual:</strong> <?=$usuario[0]['nome']?>  
		</p>
		<p>
                    <strong>É administrador ? </strong><?= $usuario[0]['tipo'] == 1 ? ' SIM':  ' NÃO' ?>
		</p>
                <form method="post" action="<?=BARRA.url_base?>/usuario/alterarloginusuario/id/<?=$usuario[0]['idusuario']?>" >
		<p>
			<strong>Novo Login</strong><br />
                        <input type="text" name="newlogin" />
		</p>
		<p>
                    <input type="submit" name="alterarL" value="Alterar Login" />
		</p>
                </form>
                <form method="post" action="<?=BARRA.url_base?>/usuario/alterarnomeusuario/id/<?=$usuario[0]['idusuario']?>">
                <p>	
                        <strong>Novo nome</strong><br />
                        <input type="text" name="newnome" />
		</p>
		<p>
                    <input type="submit" name="alterarN" value="Alterar nome" />
		</p>
                </form>
                <form method="post">
		<p>
                    <strong>É administrador?</strong><br />
                        <INPUT TYPE="RADIO" NAME="tipo" <?=$usuario[0]['tipo'] == 1 ? 'checked':'' ?> VALUE="1">SIM<br /> 
                        <INPUT TYPE="RADIO" NAME="tipo" <?=$usuario[0]['tipo'] != 1 ? 'checked':'' ?> VALUE="2">NÃO                            
		</p>
		<p>
                    <input type="submit" name="alterarA" value="Alterar administração" />
		</p>
                </form>
                <form method="post" action="<?=BARRA.url_base?>/usuario/alterarpermissaousuario/id/<?=$usuario[0]['idusuario']?>">
                <p>
                    <strong>Permissões:</strong><br />
                    <?php
                   
                   foreach ($menus_actions as $ls){
                        $check ='';
                        $disabled = '';
                        //identifica se é uma aba ou não
                        $aba_menu = $ls['action']=='1' ? ' [MENU/ABA] ' :'';
                        
                        if(   $ls['link']=='logoff'||
                                  $ls['link']=='quemsomos'||
                                    $ls['link']=='minhaarea' ||
                                      $ls['link']=='faleconosco'||
                                          $ls['link']=='index'
                                        ){
                                    $disabled = "class='invisible'";
                               } 
                                    
                           else $disabled ='';
                        
                           foreach ($permissoes as $lsp){//foreach para permissões
                          
                             
                            if($lsp['idmenu'] == $ls['idmenu']){//verifica as permissões que estão checadas
                                $check = 'checked';
                               break;
                            }
                            else {
                                $check = '';
                            }
                            
                          }//fim foreach para permissões
                            
                        echo "<p {$disabled}>
                              <input type='checkbox' name='permissao[]' {$check} {$disabled} value='{$ls['idmenu']}'>{$ls['nome']}{$aba_menu}<br>
                              </p>";
                                  
                               
                          //  }
                         }
                 ?>
                </p>
                <p>
                    <input type="submit" name="alterarP" value="Alterar permissões" />
                </p>
                </form>
                
	
</div>

<!--
	Fim de conteúdo
-->