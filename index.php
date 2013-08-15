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
   
    //FA
    
    
    
   // echo isset($_GET['control']) ? $_GET['control']:'nao existe ou vazio';
        
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
     
    