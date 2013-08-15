<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

//Carrego a classe usuario DAO para realizar as comunicações com o banco de dados 
require_once (BASEMODELDAO.'usuarioDAO.php');

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
    $var = $_SESSION['vals'];
    $t = new usuarioDAO();
   
    
    if($t->VerificaUsu($var['user'], $var['senha'])){
            echo 'usuario logado';
            $_SESSION['erro'] = 'Usuario logado com sucesso!';
            
        //header('Location: ?action=logoff');
        }
     else{           
           $_SESSION['erro'] = 'Usuario invalido!';
           header('Location: ?action=index');
     }
    }
    public function cadastrar(){
        
    }
    public function alterarsenha(){
        
    }
}

?>
