<?php if(!defined('BASEPATH')) exit('Falha no carregamento do BASEPATH!');
 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
/**
 * Description of setorControl
 *
 * @author italo
 */

class setor {    
//put your code here
    

    public function inserir(){
      $vars =  $_SESSION['session']['setor'];
      echo $vars;
     }
    
}


