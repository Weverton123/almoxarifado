<?php  if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
/**
 * Description of menuControl
 *
 * @author italo
 */
//require_once (BASEMODEL.'conexaoBD.php');//realiza a conexao com o banco
require_once (BASEMODELDAO.'usuarioDAO.php');
require_once (BASEMODELDAO.'permissaoDAO.php');
require_once (BASEMODELDAO.'menuDAO.php');
   

class menu extends controller {
    
    //variavel $res serve para enviar paramentros de resultados para a view requisitada 
    //o valor dela antes de chegar na view passa pelo arquivo controller.php recebebendo
    //um outro nome de variável, a qual será utilizada dentro da view
    private $res;
    
    function __construct() {
        $this->carregaMenu();
    }

    private function carregaMenu(){
        session_start();
        if(isset($_SESSION['session']['logado'])){ 
          
         //echo 'logado = true';
         $vars = $_SESSION['session']['logado'];
         //print_r($vars);
         $vars = unserialize($vars);//disserializo o objeto armazenado na sessão
         $menu = new menuClass();//crio um objeto para armazenar o objeto trazido pela sessão
         $menu = $vars;//armazeno na variavel $menu o objeto trazido pela sessão
         $menulimitado = array();
         $limit = count($menu)>= 3 ? 3 : count($menu);//limita a quantidade de abas e caso o limite seja menor 
         //entao ele será o limit
         for($i=0; $i < $limit ;$i++){
             $menulimitado[$i] = $menu[$i];
         }
         $this->res = $menulimitado;
           
          
        }
       
        else{
         //echo 'logado = false';
         $menuNome = array('Entrar','Quem somos','Fale conosco');
         $menuLink = array('index','quemsomos','faleconosco');
         $menu = array();
         // print_r($menuNome);
         for($i=0; $i < count($menuNome);$i++){
             $m = new menuClass();
             $m->setIdmenu($i);
             $m->setNome($menuNome[$i]);
             $m->setLink($menuLink[$i]);
            
             $menu[$i]= $m;
             
         }         
               
         $this->res = $menu;
        }
         
    }


    public function index(){
        
       //$this->carregaMenu(); 
       $this->view('inicio', $this->res);  
    }
    public function faleconosco(){
        //$this->carregaMenu();        
        $this->view('fale-conosco',  $this->res);    
    }
    public function quemsomos(){
        //$this->carregaMenu();
        $this->view('quem-somos',  $this->res);    
    }
    public function cliente(){
        //$this->carregaMenu();
        $this->view('clientes',  $this->res);
    }
    public function minhaarea(){
        //$this->carregaMenu();
        $this->view('minha-area',  $this->res);
    }
    public function materiais(){
        echo 'FALTA CRIAR';
    }
    public function requisicoes(){
        echo 'FALTA CRIAR';
    }
    public function editarusu(){
        $this->view('alterarusu', $this->res);
    }

    public function logoff(){
        session_start();
        session_unset('session');
        
        $_SESSION['erro'] = 'Logoff realizado com sucesso!';
        redirecionar('?action=index');
    }
}


