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
        
           $_SESSION['session']['erro'] = 'Usuario invalido!';
           header('Location: ?action=index');
     }
       
    
    }
    public function cadastrar(){
        
    }
    public function alterarsenha(){
        
    }
}

?>
