<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'menuClass.php');

class menuDAO{

    /*
    * Altera
    * Recebe array como parametro
    */
    public function Update($dados){

        $retorno = 0;

        # Faz conex�o
        $conexao = new conexaoBanco();
        $conexao->conectar();

        # Executa comando SQL
        $stmt = $conexao->pdo->prepare('UPDATE menu SET nome = ?, link = ?  WHERE idmenu = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(3,$dados->getIdmenu());
        $stmt->bindValue(1,$dados->getNome());
        $stmt->bindValue(2,$dados->getLink());


        try{
            $retorno = $stmt->execute();
        }
        catch (PDOException $e) {
            echo 'Erro: '.$e->getMessage();
            $retorno = -1;
        }

        return $retorno;
    }
    /*
    * M�todo de Inclus�o
    * Insere dados recebendo valores via par�metro
    * ---------------------------------------------
    */
    public function incluir($dados){
        # Faz conex�o
        $conexao = new conexaoBanco();
        $conexao->conectar();

        try{
            $stmt = $conexao->pdo->prepare('INSERT INTO menu (nome, link) VALUES (?,?)');



			$stmt->bindValue(1,$dados->getNome());
			$stmt->bindValue(2,$dados->getLink());

            $retorno = $stmt->execute();
        }
        catch ( PDOException $ex ){  
            echo 'Erro: ' . $ex->getMessage(); 
        }

        return $retorno;
    }
    /*
    * Obtem por Pk
    */
    public function ObterPorPK($pk){

    	# Faz conex�o
	    $conexao = new conexaoBanco();
	    $conexao->conectar();

	    # Executa comando SQL
	    $stmt = $conexao->pdo->prepare('SELECT idmenu, nome, link FROM menu WHERE idmenu = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	#Inst�ncia da entidade
    	$menuClass = new menuClass();

    	foreach( $retorno as $row ){

    		#Atribui valores
		    $menuClass->setIdmenu($row['idmenu']);
		    $menuClass->setNome($row['nome']);
		    $menuClass->setLink($row['link']);
    	}

    	return $menuClass;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){
        
    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();
            
    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT idmenu, nome, link FROM menu ');
       
    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$menuClass = new menuClass();
              
    		#Atribui valores
		    $menuClass->setIdmenu($row['idmenu']);
		    $menuClass->setNome($row['nome']);
		    $menuClass->setLink($row['link']);

    		$lista[$i] = $menuClass;
    		$i++;
    	}

    	return $lista;
    }
    /*
    * Delete
    * Recebe PK como parametro
	*/
    public function Deletar($pk){

		$retorno = 0;

		# Faz conex�o
		$conexao = new conexaoBanco();
		$conexao->conectar();

		# Executa SQL
		$stmt = $conexao->pdo->prepare('DELETE FROM menu WHERE idmenu = ?');

		$dadosDelete = array($pk);

		try{
			$retorno = $stmt->execute($dadosDelete);
		}
		catch (PDOException $e) {
			echo 'Erro: '.$e->getMessage();
			$retorno = -1;
		}

		return $retorno;
	}

}
?>
