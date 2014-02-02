<?php

//url base
define('url_base', 'almoxarifado');
//pagina base
define('PAGEBASE', 'index');

//tempo que o usuário poderá permanecer logado e inativo. Obs.: tempo em segundos
define('TEMPOSESSAO', 3600);

//Constantes definidas com bases de cada diretório 
    define('BARRA', '/');
    define('BASEVIEWPAGEMASTER', 'app/view/base/');    
    define('BASEPATH', getcwd().DIRECTORY_SEPARATOR);
    define('BASECSS','style/css/');
    define('BASEJS','style/js/');
    define('BASEFONTES','style/fonts/');
    define('BASEIMAGES', 'style/images/');
    define('BASESYSTEM', 'system/');
    define('BASEMODEL', 'app/model/');
    #define('BASEMODELCLASS', BASEMODEL.'class/');
    #define('BASEMODELDAO', BASEMODEL.'dao/');
    define('BASEVIEW', 'app/view/');
    define('BASECONTROL', 'app/control/');
    define('BASEVIEWINC', BASEVIEW.'includes/');
    define('TEMPLATE_BASE', BASEVIEWPAGEMASTER.'base.php');
//Pasta temp
define('BASETEMP',BASESYSTEM.'temp/');


//carrega as configurações do banco
    require_once (BASESYSTEM.'configDB.php');
   
    
    
                                                                                                                                                                                                                                                                                          