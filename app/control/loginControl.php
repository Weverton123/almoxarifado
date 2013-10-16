<?php if(!defined('BASEPATH')) exit(header('Location: ./../../index.php'));
//seguranca_arq();
//Carrego as classes  DAO's para realizar as comunicações com o banco de dados 
//e buscar os menus de acordo com as permissoes
//require_once (BASEMODEL.'conexaoBD.php');//realiza a conexao com o banco
require_once (BASEMODELDAO.'usuarioDAO.php');//metodos CRUD do usuario 
require_once (BASEMODELDAO.'permissaoDAO.php');//metodos CRUD de permissoes 
require_once (BASEMODELDAO.'menuDAO.php');//metodos CRUD do menu 

/**
 * Description of loginControl
 *
 * @author italo
 */

 //Inicio a sessão para poder utilizar a session com os valores das requisições
 session_start();

class login {   


    public function validar(){
        
    //armazeno na variavel $var os valores na sessão vals
    $var = $_SESSION['session'];
    //Termina a sessão atual

    
   //echo $var['user'];
    $usu = new usuarioDAO();
    
    $ret = $usu->VerificaUsu($var['user'], $var['senha']);
    
    if($ret){
        
        $perm = new permissaoDAO();
        $menu = new menuDAO();
        //$ret2 = $menu->ObterPorTodos();
        $ret2 = $perm->ObterPorPK($ret->getIdusuario());//obtem os id's das permissões para o usuario informado
        $lista_menu = array();
        $i=0;
       foreach ($ret2 as $ln){
           $lista_menu[$i] = $menu->ObterPorPK($ln->getMenu_idmenu());//obtem o nome de cada menu disponivel para o usuario
           $i++;
       }
        
            //$_SESSION['erro'] = 'Usuario logado com sucesso!';
          /* foreach ($lista_menu as $ms){
            echo $ms->getNome().' ';
            }*/
          

         $_SESSION['session']=array('logado'=>  serialize($lista_menu),
                                    'usuario' => serialize($ret),
                                    'acoes'=>''
                                    );  
           redirecionar('?action=minhaarea');
        }
     else{ 
        
           $_SESSION['session']['msg'] = 'Usuario inválido!';
           redirecionar('?action=index');
     }
       
    
    }
  
    public function cadastrar(){
        $usu = new usuarioClass();
        $usu->setNome($_SESSION['session']['acoes']['nome']);
        $usu->setLogin($_SESSION['session']['acoes']['login']);
        $usu->setSenha($_SESSION['session']['acoes']['senha']);
        $usu->setSetor_idsetor($_SESSION['session']['acoes']['setor']);
        $usu->setTipousuario_idtipousuario($_SESSION['session']['acoes']['tipousu']);
        
        $usuario = new usuarioDAO();
        $ret = $usuario->ObterPorPK($usu->getLogin());
        if($ret){
            $_SESSION['session']['acoes']['msg'] = 'Login já cadastrado!';
        }
        else {
            //$usuario->incluir($login, $nome, $senha, $idsetor, $idtipousuario);
            $ret = $usuario->incluir($usu->getLogin(), $usu->getNome(), $usu->getSenha(), $usu->getSetor_idsetor(), $usu->getTipousuario_idtipousuario());
            if($ret){//se o usuario for cadastrador com sucesso insiro as permissões de acesso
               $ret = $usuario->ObterPorPK($usu->getLogin());//verifica e carrega o usuario cadastrado para identificar o id
                try{
                $perm = new permissaoDAO();
                $listPerm = $_SESSION['session']['acoes']['permissao'];
                 
                    foreach ($listPerm as $ls){
                        $perm->incluir($ls,$ret->getIdusuario());
                    }
                  $_SESSION['session']['acoes']['msg'] = 'Cadastro realizado com sucesso!';
                }
               catch (Exception $ex){
                 $_SESSION['session']['acoes']['msg'] = 'Falha no cadastro das permissões!';
               }
            }
            else {
               $_SESSION['session']['acoes']['msg'] = 'Falha ao cadastrar usuário!';
            }
            
        }
        
        redirecionar('?action=usuario');
        
     }
   
    public function alterarsenha(){
        $usuario = new usuarioDAO();
        
        $usu = new usuarioClass();
        $usu = unserialize($_SESSION['session']['usuario']);
        
        $senha = $_SESSION['session']['acoes'] ;
        
        //$_SESSION['session']['acoes']['msg']=$usu->getLogin().' '.$senha['senha'];
        
        $ret = $usuario->VerificaUsu($usu->getLogin(), $senha['senha']);
        
        if($ret){
            
            $ret = $usuario->alterarSenha($senha['newsenha'], $ret->getIdusuario());
           
            if($ret > 0){
              $_SESSION['session']['acoes']['msg']='Senha alterada com sucesso!';
            }
            else{
              $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
            }
        }
        else {
            $_SESSION['session']['acoes']['msg']='Senha inválida!';
        }
        redirecionar('?action=minhaarea');
        
    }
   
    public function alterarlogin(){
        $flag = 0;
        
        $usuario = new usuarioDAO();
        
        $usu = new usuarioClass();
        $usu = unserialize($_SESSION['session']['usuario']);
        
        $alterar = $_SESSION['session']['acoes'] ;   
        if(isset($alterar['senha'])){
        
        $ret = $usuario->VerificaUsu($usu->getLogin(), $alterar['senha']);
        $flag = 1;
        
            if($ret){        
                $ret = $usuario->alterarLogin($alterar['newlogin'], $ret->getIdusuario());

                if($ret > 0){

                  $usu->setLogin($alterar['newlogin']);
                  $_SESSION['session']['usuario'] = serialize($usu);
                  $_SESSION['session']['acoes']['msg']='Login alterado com sucesso!';
                }
                else{
                  $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
                }
            }
            else {
            $_SESSION['session']['acoes']['msg']='Senha inválida!';
            }
        }
        else {
            
              $ret = $usuario->alterarLogin($alterar['newlogin'],$alterar['idusu']);
                if($ret > 0){
                    
                 $_SESSION['session']['acoes']['msg']='Login alterado com sucesso!';
                }
                else{
                    $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
                }  
            
        }
        
        if($flag==1){
            //echo 'flag = 1';
            redirecionar('?action=minhaarea');
        }
        else{
            
            //echo  $alterar['idusu'].$alterar['newlogin'];
            redirecionar('?action=usuario');
        }
    }
    
    public function alterarnome(){
        $flag = 0;
        
        $usuario = new usuarioDAO();
        
        $usu = new usuarioClass();
        
        $alterar = $_SESSION['session']['acoes'] ;   
        if(isset($alterar['senha'])){
        
        $ret = $usuario->VerificaUsu($usu->getLogin(), $alterar['senha']);
        $flag = 1;
        
            if($ret){        
                $ret = $usuario->alterarLogin($alterar['newlogin'], $ret->getIdusuario());

                if($ret > 0){

                  $usu->setLogin($alterar['newlogin']);
                  $_SESSION['session']['usuario'] = serialize($usu);
                  $_SESSION['session']['acoes']['msg']='Login alterado com sucesso!';
                }
                else{
                  $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
                }
            }
            else {
            $_SESSION['session']['acoes']['msg']='Senha inválida!';
            }
        }
        else {
            
              $ret = $usuario->alterarNome($alterar['newnome'],$alterar['idusu']);
                if($ret > 0){
                    
                 $_SESSION['session']['acoes']['msg']='Nome alterado com sucesso!';
                }
                else{
                    $_SESSION['session']['acoes']['msg']='Falha na alteração!';  
                }  
            
        }
        
        if($flag==1){
            //echo 'flag = 1';
            redirecionar('?action=minhaarea');
        }
        else{
            
            //echo  $alterar['idusu'].$alterar['newlogin'];
            redirecionar('?action=usuario');
        }
    }

    public function alterarperm(){
     $perm = new permissaoDAO();
                $listPerm = $_SESSION['session']['acoes']['permissao'];
                $iduser   = $_SESSION['session']['acoes']['idusuario'];
                
                    $perm->Deletar($iduser);
                    foreach ($listPerm as $ls){
                        $perm->incluir($ls,$iduser);
                    }
                  $_SESSION['session']['acoes']['msg'] = 'Alterações realizada com sucesso!';
                  redirecionar('?action=usuario');
    }
    
    public function alteraradmin(){
     $tipo = new usuarioDAO();  
             $adm = $_SESSION['session']['acoes']['newtipo'];
             $iduser   = $_SESSION['session']['acoes']['idusu'];
               
     $tipo->alterarAdm($adm, $iduser);
     $_SESSION['session']['acoes']['msg'] = 'Alterações realizada com sucesso!';
     redirecionar('?action=usuario');
     
    }
    public function deletarusu(){
       // session_start();

        if(!isset($_SESSION['session']['acoes']['idusuario'])){
            redirecionar('?action=usuario');
        }
         if(verifica_acesso()){
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
         }
         else{
           $_SESSION['session']['acoes']['msg']='Usuário sem permissão para realizar exclusão!';
        }
        redirecionar('?action=usuario');
    }
}

