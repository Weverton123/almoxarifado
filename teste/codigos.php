<?php
/*LIXEIRA DE CODIGOS CASO PRECISE*/

/**
 * Description of codigos
 *
 * @author italo
 */

//$nome = array('Inicio','Contato','Fale Conosco');
        //$link = array('index','contato','faleconosco');
        //$menu = array('nome'=>$nome,'link'=>$link);
        //$array = array('menu'=>$menu,'usuario'=>'italo');
        //print_r($crud)


//echo $controller.' '.$action;
    //require (BASESYSTEM.'controller.php');
    
   
    //$app = new $controller();
    //$app->$action();
    
    /*function __autoload( $file ){
        require_once (BASECONTROL.$file.'.php');
    }*/
    
    //require_once ('system/controller.php');
    //require_once ('system/configDB.php');
    
    //require_once (BASECONTROL.$controller.'Control.php');
    //$app = new $controller();
    //$app->$action();
   
    //echo $controller.$action;

/*
     // Nas linhas abaixo você poderá colocar as informações do Banco de Dados.
    var $host = "localhost"; // Nome ou IP do Servidor
    var $user = "root"; // Usuário do Servidor MySQL
    var $senha = "123456"; // Senha do Usuário MySQL
    var $dbase = "formulario"; // Nome do seu Banco de Dados

    // Criaremos as variáveis que Utilizaremos no script
    var $query;
    var $link;
    var $resultado;
    

    // Instancia o Objeto para podermos usar
    function MySQL(){
    
    }
  

  // Cria a função para efetuar conexão ao Banco MySQL (não é muito diferente da conexão padrão).
  // Veja que abaixo, além de criarmos a conexão, geramos condições personalizadas para mensagens de erro.
    function conecta(){
        $this->link = mysql_connect($this->host,$this->user,$this->senha);
    // Conecta ao Banco de Dados
        if(!$this->link){
      // Caso ocorra usm erro, exibe uma mensagem com o erro
            print "Ocorreu um Erro na conexão MySQL:";
      print "<b>".mysql_error()."</b>";
      die();
        }elseif(!mysql_select_db($this->dbase,$this->link)){
      // Seleciona o banco após a conexão
      // Caso ocorra um erro, exibe uma mensagem com o erro
            print "Ocorreu um Erro em selecionar o Banco:";
      print "<b>".mysql_error()."</b>";
      die();
        }
    }

  // Cria a função para "query" no Banco de Dados
    function sql_query($query){
        $this->conecta();
        $this->query = $query;

    // Conecta e faz a query no MySQL
        if($this->resultado = mysql_query($this->query)){
            $this->desconecta();
            return $this->resultado;
        }else{
      // Caso ocorra um erro, exibe uma mensagem com o Erro
            print "Ocorreu um erro ao executar a Query MySQL: <b>$query</b>";
      print "<br><br>";
      print "Erro no MySQL: <b>".mysql_error()."</b>";
      die();
            $this->desconecta();
        }        
    }

  // Cria a função para Desconectar do Banco MySQL
    function desconecta(){
        return mysql_close($this->link);
    }

        /* private $dsn = 'mysql:host=localhost;dbname=novoalmoxarifado';
        private $user= 'root';
        private $senha= '123456';
        private $pdo;
        
        function __construct() {
              
        if ($this->conectar()) {
                $this->consultar('*','menu');
                /*foreach ($ac as $val){
                    echo $val.'<br>';
                    }
        }
            else   echo 'Falha na conexao!';
            
                 
            
        }


        protected function conectar(){
            if(empty($this->pdo)){
                $this->pdo = new PDO($this->dsn, $this->user, $this->senha);
                
                return $this->pdo;
                
            }
        }
    
        public function inserir(array $campos, $tabela){
            $coluna = implode(", ",  array_keys($campos));
            $valor = "'".implode("', '", array_values($campos))."'";
            
            $query = "INSERT INTO {$tabela} ({$coluna}) VALUES ({$valor})";
            
            $this->conectar()->exec($query);
        }
        
        public function consultar(array $select, $tabela, $where = null, $order = null, $limit = null){
            $where = ($where == null) ? null : "WHERE {$where}";
            if($select != "*"){
                $select = implode(", ", $select);
            } else {
                $select = "*";
            };
            
            $order = ($order == null) ? null : "ORDER BY {$order}";
            $limit = ($limit == null) ? null : "LIMIT {$limit}";
            
            $query = "SELECT {$select} FROM {$tabela} {$where} {$order} {$limit}";
            //$result = $this->conectar()->query($query);
            
            $result =  $this->pdo->exec($query);
//echo "<strong>Query do método consulta():</strong><br /> <code style='color:green'>".$query."</code><br /><br />";
        print_r($result);
            //return $result;
        }
        
        public function deletar($tabela, $where){
            $query = "DELETE FROM {$tabela} WHERE {$where}";
            
            $this->conectar()->exec($query);
            //echo "<strong>Query do método deletar():</strong><br /> <code style='color:green'>".$query."</code><br /><br />";
        }
        
        public function atualizar($tabela, array $set, $where){
            foreach($set as $chave => $valor){
                $campos[] = "{$chave}='{$valor}'";
            };
            $campos = implode(", ", $campos);
            $query = "UPDATE {$tabela} SET {$campos} WHERE {$where}";
            
            $result = $this->conectar()->exec($query);
            
            //if($result == 1){
            //    echo "Registro Atualizado com êxito";
            //};
            
            //echo "<strong>Query do método atualizar():</strong><br /> <code style='color:green'>".$query."</code><br /><br />";
        }
        *
 * 
 * 
 * public function connect() // estabelece conexao
    {
        if(!$this->con)
        {
            //realiza conexao com mysql
            $myconn = mysql_connect($this->db_host,$this->db_user,$this->db_senha);
            if($myconn)
            {
                //realiza seleção do banco de dados para uso
                $seldb = mysql_select_db($this->db_name,$myconn);
                if($seldb)
                {
                    $this->con = true;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

  
    public function disconnect() // fecha conexao
    {
    if($this->con)
    {
        if(mysql_close())
        {
                        $this->con = false;
            return true;
        }
        else
        {
            return false;
        }
    } 
        */



        //echo $_SERVER['REQUEST_URI'];  
        
             // $this->getUrl();//passo 1
             // $this->getParams();//passo 2
/*
    private function getUrl(){//passo 1
        $_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] == '/aplication/' ? 'menu/index' : $_SERVER['REQUEST_URI'];
        return $this->url = $_SERVER['REQUEST_URI'];
    }*/
  /*  private function getParams(){//passo 2
        $this->params = explode('/',$this->url);
    }
   * aplication/index.php?control=$value&action=$value
   */
/*
function __autoload($classe){    
     if(file_exists(BASECONTROL.$classe."Control.php")){
            require_once (BASECONTROL.$classe."Control.php");
        } 
    
        else {
            echo utf8_decode("A classe {$classe} não existe!");  
        }
}
 * 
 */


/*
    $_GET['url'] = (isset($_GET['url'])? $_GET['url'].'/': 'menu/index');
    $url = $_GET['url'];
    
    $separador = explode('/', $url);
    
    $controller = $separador[0];
    $action = ($separador[1]== null ? 'index': $separador[1]);
 * 
 */