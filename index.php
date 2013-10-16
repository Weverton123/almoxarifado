<?php   
   
    //Constantes definidas com bases de cada diretório 
    define('BASEPATH', getcwd().DIRECTORY_SEPARATOR);
    define('BASECSS','style/css/');
    define('BASEJS','style/js/');
    define('BASEFONTES','style/fonts/');
    define('BASEIMAGES', 'style/images/');
    define('BASESYSTEM', 'system/');
    define('BASEMODEL', 'app/model/');
    define('BASEMODELCLASS', BASEMODEL.'class/');
    define('BASEMODELDAO', BASEMODEL.'dao/');
    define('BASEVIEW', 'app/view/');
    define('BASECONTROL', 'app/control/');
    define('BASEVIEWINC', BASEVIEW.'includes/');
   
    //$_SESSION['session'] serve para armazenar os valores em uma session 
    //valores bi-dimensional para realizar uma busca eh preciso utilizar 
    //a seguinte estrutur $_SESSION['session']['nome_da_sessao_criada']
    $_array_geral = array();
    
    //A cada exception ou erro na utilização do sistema será informado um
    //código de erro segue os códigos e seus erros:
   /*  CÓDIGO  | ERRO
    *  0001    | Falha no carregamento do script ou usuário está tentando acessar a pagina pela URL diretamente sem ter passado pela index. 
    *  
    * 
    */
 
   // echo isset($_GET['control']) ? $_GET['control']:'nao existe ou vazio';
    
    if(file_exists(BASESYSTEM.'configDB.php')){//se a configuração do banco não existir é iniciado o passo de instalação
    
    if(file_exists(BASEPATH.'autoload.php')){
        try {
        
             require_once (BASEPATH.'autoload.php');
             //executa a classe autoload para captura das requisições enviada pela url
             new autoload;
        }
      catch (Exception $ex){
            echo 'Falha no carregamento da página autoload!';
      }
    }     
    else  
        echo 'houve falha';
    }
    else {
        require_once ('install/instaler.php');
    }
    