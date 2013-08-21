<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

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

    public function didi(){
        echo 'IAAAEEEE!';
    }

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
        $ret2 = $perm->ObterPorPK($ret->getIdusuario());
        $lista_menu = array();
        $i=0;
       foreach ($ret2 as $ln){
           $lista_menu[$i] = $menu->ObterPorPK($ln->getMenu_idmenu());
           $i++;
       }
        
            //$_SESSION['erro'] = 'Usuario logado com sucesso!';
           /*foreach ($lista_menu as $ms){
            echo $ms->getNome().' ';
            }*/
          

         $_SESSION['session']=array('logado'=>  serialize($lista_menu),
                                    'usuario' => serialize($ret),
                                    'acoes'=>''
                                    );  
         header('Location: ?action=minhaarea');
        }
     else{ 
        
           $_SESSION['session']['msg'] = 'Usuario inválido!';
           header('Location: ?action=index');
     }
       
    
    }
    public function cadastrar(){
        print_r($_SESSION['session']['acoes']);
        $usu = new usuarioClass();
        $usu->setNome($_SESSION['session']['acoes']['nome']);
        $usu->setLogin($_SESSION['session']['acoes']['login']);
        $usu->setSenha($_SESSION['session']['acoes']['senha']);
        $usu->setSetor_idsetor($_SESSION['session']['acoes']['setor']);
        $usu->setTipousuario_idtipousuario($_SESSION['session']['acoes']['tipousu']);
        
        $usuario = new usuarioDAO();
        $ret = $usuario->ObterPorPK($usu->getLogin());
        
        if(!$ret){
            $_SESSION['session']['acoes']['msg'] = 'Login já cadastrado!';
        }
        else {
            $ret = $usuario->incluir($usu);
            if($ret){//se o usuario for cadastrador com sucesso insiro as permissões de acesso
                $perm = new permissaoDAO();
                $listPerm = $_SESSION['session']['acoes']['permissao'];
                    foreach ($listPerm as $ls){
                        $perm->incluir($ls,$usu->getIdusuario());
                    }
                  $_SESSION['session']['acoes']['msg'] = 'Cadastro realizado com sucesso!';
            }
            else {
                $_SESSION['session']['acoes']['msg'] = 'Falha ao cadastrar usuário!';
            }
            
        }
        
        header('Location: ?action=cliente');
        
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
        header('Location: ?action=minhaarea');
        
    }
    public function alterarlogin(){
        $usuario = new usuarioDAO();
        
        $usu = new usuarioClass();
        $usu = unserialize($_SESSION['session']['usuario']);
        
        $alterar = $_SESSION['session']['acoes'] ;   
        
        $ret = $usuario->VerificaUsu($usu->getLogin(), $alterar['senha']);
          
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
        header('Location: ?action=minhaarea');
    }
}

