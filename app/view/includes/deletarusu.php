<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
  //Ativa o Buffer que armazena o conteúdo principal da página
seguranca_arq();  
ob_start();

session_start();

  if(!isset($_SESSION['session']['acoes']['idusuario'])){
      redirecionar('?action=usuario');
  }
  
   $usu = $_SESSION['session']['acoes']['idusuario'];
   
   
  
   $usuperm = new permissaoDAO();
   $usuario = new usuarioDAO();
   $usuperm->Deletar($usu);//primeiro é preciso excluir as permissões
   $ret =  $usuario->Deletar($usu);//segundo exclui o usuario
   
   if($ret > 0){
      $_SESSION['session']['acoes']['msg']='Usuário excluído com sucesso!';
   }
   else{
      $_SESSION['session']['acoes']['msg']='Falha ao tentar excluir usuário!';  
   }
    
  redirecionar('?action=usuario');