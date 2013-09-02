<?php
/*
 * UTILIZANDO CRUD GENERICO
 */
echo 'teste';

if(file_exists('../system/configDB.php')){
  require_once('../system/configDB.php');
             if(file_exists('../app/model/crud.php')){
               require_once('../app/model/crud.php');
               
               $crud = new crud();
              
               /*CONSULTAR*/
               /*  $dados = array('(SELECT nome FROM menu WHERE idmenu = menu_idmenu) as menu');
               
               $res = $crud->consultar($dados, 'permissao','usuario_idusuario = 3');
               foreach ($res as $row){
                   echo '<br />'.$row['menu'];
               }*/
               /*FIM CONSULTA */
               
               /*DELETAR*/
               /*
               $tabela = 'setor' ;
               $valor ='teste';
               $where = "nome ='{$valor}'";
               $result = $crud->deletar($tabela, $where);
                if($result > 0){
                    echo 'deletado  com sucesso';
                }
                else {
                    echo 'falha ao tentar deletar';
                }*/
               /*FIM DELETAR */
               
               /*INSERIR */
               /* $nome = 'test' ;
               $dadosAlt = array( 'nome' =>$nome );
               
               $result = $crud->inserir($dadosAlt, 'setor');
                if($result > 0){
                    echo 'insercao realizada com sucesso';
                }
                else {
                    echo 'falha na insercao';
                }*/
               /*FIM INSERIR */
               
               /*ATUALIZAR */
               /* 
               $nome = 'usuario' ;
               $senha = '123';
               $dadosAlt = array( 'nome' =>$nome,
                                  'senha'=>$senha  
                   );
               $where = 'idusuario = 3';
               $result = $crud->atualizar('usuario', $dadosAlt, $where);
                if($result > 0){
                    echo 'atualizacao realizada com sucesso';
                }
                else {
                    echo 'falha na atualizacao';
                }*/
               /*FIM ATUALIZAR */
               }
              else {
                 echo 'falha ao carregar arquivo crud';
               }
        }
   else{
        echo 'falha ao carregar arquivo configBD';
   }
    
    


/*
 * FIM UTILIZANDO CRUD GENERICO
 */


/*
 * LISTAGEM DE MENUS DE ACORDO COM AS PERMISSÕES
 * 
session_start();
if(file_exists('../app/model/conexaoBD.php')){
    require_once '../app/model/conexaoBD.php';
    require_once '../app/model/class/usuarioClass.php';
    require_once '../app/model/dao/usuarioDAO.php';
    require_once '../app/model/class/menuClass.php'; 
    require_once '../app/model/dao/menuDAO.php'; 
    require_once '../app/model/class/permissaoClass.php'; 
    require_once '../app/model/dao/permissaoDAO.php'; 
    
    $usu = new usuarioDAO();
    $ret = $usu->VerificaUsu('admin', '123');
    if($ret){
       $perm = new permissaoDAO();
       $menu = new menuDAO();
       $ret2 = $perm->ObterPorPK($ret->getIdusuario());
       $lista_menu = array();
       $i=0;
       foreach ($ret2 as $ln){
            $lista_menu[$i] = $menu->ObterPorPK($ln->getMenu_idmenu());
            $i++;
       }
       foreach ($lista_menu as $list){
           echo $list->getNome().' ';
       }
    }
    else{
        echo 'usuario invalido!';
    }
}
 else {
    echo 'arquivo de conexao nao encontrado';
}
 * FIM DA LISTAGEM DE MENUS DE ACORDO COM AS PERMISSÕES
 */

/*
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
*/  




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


