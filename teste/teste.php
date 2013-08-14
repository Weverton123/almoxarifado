<?php

if(file_exists('../app/model/dao/usuarioDAO.php')){

    require_once ('../app/model/conexaoBD.php');
    require_once ('../app/model/class/usuarioClass.php');

    require_once '../app/model/dao/usuarioDAO.php';
    
    
    $t = new usuarioDAO();
    $t->VerificaUsu('admin', '1234');
    if(isset($_SESSION['logado'])){
        echo 'usuario logado com sucesso';
    }
    else        echo 'login ou senha invalido';
}
 else {
    echo 'falha no carregamento do arquivo';    
}
  




//TESTE DE CONEXAO E BUSCA/LISTAGEM DOS MENUS
/*if(file_exists('../app/model/conexaoBanco.php')){   
    require_once ('../app/model/conexaoBanco.php');
    //echo 'conexao ENCONTRADO';
        if(file_exists('../app/model/class/menuClass.php')){        
            //echo 'class ENCONTRADO';
          require_once ('../app/model/class/menuClass.php');
            
          
          
             if(file_exists('../app/model/dao/menuDAO.php')){
                 //echo 'DAO ENCONTRADO';  
                require_once ('../app/model/dao/menuDAO.php');
                
                 try{
                    // echo 'entrou';
                    $pd = new menuDAO();
                    //echo 'entrou2';
                    try{
  
                      $ret = $pd->ObterPorTodos();
                      
                       //echo 'entrou3';
                      
                       foreach ($ret as $val){
                           
                           echo $val->getNome().'<br>';
                           
                       }
                       
                    }
                    catch (Exception $ex){
                        echo 'Erro na busca: '.$ex;
                    }
                }
                 catch (Exception $ex){
                     echo 'Erro: '.$ex;
                 }
 
             }
            else echo 'arquivo DAO nao carregado!';

    
    }
    else echo 'arquivo Class nao carregado!';

}
else echo 'arquivo conexao nao carregado!';*/ //ok
//FIM TESTE DE CONEXAO E BUSCA/LISTAGEM DOS MENUS








/*
$mysql = "mysql:host=localhost;dbname=novoalmoxarifado";
$username = "root";
$passwd = "123456";
    try{
        $pdo = new PDO($mysql, $username, $passwd);
    }
    catch (PDOException $e) {
        echo 'Erro: '.$e->getMessage();
    }
    try{
        $execucao = $pdo->prepare("select * from menu");
        if($execucao->execute()){    
        
        while ($row = $execucao->fetch()) {

            $nome = $row['nome'];
            $link = $row['link'];

            echo  $nome . " - ", $link . "<br>";


            }
        }
        else            echo utf8_decode ('falha na execução da query!');
    }
 catch (Exception $ex){
        echo 'Erro: '.$ex->getMessage();
 }
*/


/**
 * Description of teste
 *
 * @author italo
 
class teste {
    //put your code here
}*/


