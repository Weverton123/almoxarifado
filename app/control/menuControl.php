<?php  if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
/**
 * Description of menuControl
 *
 * @author italo
 */
require_once (BASEMODELDAO.'menuDAO.php');
   

class menu extends controller {
    private $res;
    private function carregaMenu(){               
         $t = new menuDAO();
         $this->res = $t->ObterPorTodos();
    }


    public function index(){
        
       $this->carregaMenu(); 
       $this->view('inicio', $this->res);  
    }
    public function faleconosco(){
        $this->carregaMenu();        
        $this->view('fale-conosco',  $this->res);    
    }
    public function quemsomos(){
        $this->carregaMenu();
        $this->view('quem-somos',  $this->res);    
    }
    public function cliente(){
        $this->carregaMenu();
        $this->view('clientes',  $this->res);
    }
    public function minhaarea(){
        $this->carregaMenu();
        $this->view('minha-area',  $this->res);
    }
    public function materiais(){
        echo 'FALTA CRIAR';
    }
    public function requisicoes(){
        echo 'FALTA CRIAR';
    }
    
}


