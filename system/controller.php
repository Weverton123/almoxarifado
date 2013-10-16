<?php if(!defined('BASEPATH')) exit(header('Location: ./../index.php'));
    
/**
 * Description of controller
 *
 * @author italo
 */
require_once (BASESYSTEM.'configDB.php');
require_once (BASESYSTEM.'seguranca.php');

class controller extends configDB{
//variável $val é utilizada para passar parâmetros para a view requisitada
    protected function view( $nameView, array $val = array() ){
        //redirecionar(BASEVIEWINC.$nameView);
        require_once (BASEVIEWINC.$nameView.'.php');        
        exit();
    }
  	
    
}

