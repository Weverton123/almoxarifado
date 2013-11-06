<?php  if(!defined('BASEPATH')) exit(header('Location: ./../../index.php'));
//seguranca_arq();
/**
 * Description of menuControl
 * Serve para carregar exibir as view's
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
         //print_r($vars);
         $menu = new menuClass();//crio um objeto para armazenar o objeto trazido pela sessão
         $menu = $vars;//armazeno na variavel $menu o objeto trazido pela sessão
         $menulimitado = array();
         //$limit = count($menu)>= 3 ? 3 : count($menu);//limita a quantidade de abas e caso o limite seja menor 
         //$limit = $menu->getLink()=='faleconosco' ? 
         
         $j = 0;
         
         for($i=0; $i < count($menu) ;$i++){
             //if para exibir apenas os menus que são aba
             if($menu[$i]->getLink()=='faleconosco' || $menu[$i]->getLink()=='editarusu'||
                $menu[$i]->getLink()=='deletarusu' || $menu[$i]->getLink()=='setor'||
                $menu[$i]->getLink()=='index' || $menu[$i]->getLink()=='usuario'||
                $menu[$i]->getLink()=='cadastrarusu'||$menu[$i]->getLink()=='editarsetor'||     
                $menu[$i]->getLink()=='cadastrarsetor'||$menu[$i]->getLink()=='deletarsetor'||
                $menu[$i]->getLink()=='material'||$menu[$i]->getLink()=='requisicao'||
                $menu[$i]->getLink()=='cadastrarmaterial'||$menu[$i]->getLink()=='cadastrarrequisicao'||
                $menu[$i]->getLink()=='deletarmaterial'||$menu[$i]->getLink()=='deletarrequisicao'||
                $menu[$i]->getLink()=='editarmaterial'||$menu[$i]->getLink()=='editarrequisicao'

                 ){
             
             }
            else {
             if($menu[$i]->getLink()=='minhaarea'){
                 $minhaArea = $menu[$i];
             } 
             else if($menu[$i]->getLink()== 'logoff'){
                 $sair = $menu[$i];
             }
             else{
                 $menulimitado[$j] = $menu[$i];
                 $j++;
             }
            
            }           
         }
         $menulimitado[$j] = $minhaArea;//define penultima posição do menu para o menu $minhaArea
         $j++;
         $menulimitado[$j] = $sair;//define ultima posição do menu para o menu $sair
         //print_r($menulimitado);
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

    //RELACIONADO AO MENU OFFLINE
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
  
   
    
    //RELACIONADO AO MATERIAL
    public function material(){
       $this->view('material',  $this->res);    
    }
    public function cadastrarmaterial(){
       $this->view('cadastrarmaterial',  $this->res);    
    }
    public function editarmaterial(){
       $this->view('alterarmaterial',  $this->res);    
    }
    
    //RELACIONADO A REQUISIÇÃO
    public function requisicao(){
        $this->view('requisicao', $this->res);
    }
    public function cadastrarrequisicao(){
        $this->view('cadastrarrequisicao', $this->res);
    }
    
    
    //MENU PARA GERENCIAR MATERIAL E REQUISIÇÕES
    public function requisicoes(){
       $this->view('requisicoes',  $this->res);
    }
    
    
    //MENU PARA GERENCIAR SETOR E USUARIO
    public function cliente(){
        //$this->carregaMenu();
        $this->view('clientes',  $this->res);
    }
    
   
    //RELACIONADO AO USUÁRIO
    public function usuario(){//página de listagem de usuários
        $this->view('usuarios', $this->res);
    }
    public function cadastrarusu(){//página para cadastro de usuário
        $this->view('cadastrarusu', $this->res);
    }
    public function editarusu(){//página para edição de usuário 
        $this->view('alterarusu', $this->res);
    }
    //USUÁRIO ATUAL
    public function minhaarea(){
        //$this->carregaMenu();
        $this->view('minha-area',  $this->res);
    }
    
    
    //RELACIONADO AO SETOR
    public function setor(){
        $this->view('setores', $this->res);
    }
    public function cadastrarsetor(){
        $this->view('cadastrarsetor', $this->res);
    }
    public function editarsetor(){
        $this->view('alterarsetor',  $this->res);
    }
    
    
    //ENCERRA CONEXÃO        
    public function logoff(){
        session_start();
        session_unset('session');
        
        $_SESSION['erro'] = 'Logoff realizado com sucesso!';
        redirecionar('?action=index');
    }
}


