<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

//require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'setorClass.php');

class setorDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE setor SET nome = ?  WHERE idsetor = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(3,$dados->getIdsetor());
        $stmt->bindValue(1,$dados->getNome());
        $stmt->bindValue(2,$dados->getCodigo());

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
            $stmt = $conexao->pdo->prepare('INSERT INTO setor (nome,codigo) VALUES (?,?)');



			$stmt->bindValue(1,$dados->getNome());
                        $stmt->bindValue(2,$dados->getCodigo());

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
	    $stmt = $conexao->pdo->prepare('SELECT idsetor, nome, codigo FROM setor WHERE idsetor = ? OR nome = ? OR codigo = ?');

	    # Passando os valores a serem usados
    	$dados = array($pk,$pk,$pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($retorno !=NULL){
    	#Inst�ncia da entidade
    	$setorClass = new setorClass();
        
    	foreach( $retorno as $row ){

    		#Atribui valores
		    $setorClass->setIdsetor($row['idsetor']);
		    $setorClass->setNome($row['nome']);
    	}

        return $setorClass;
        
        }
        else {
            return FALSE;
        }
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT idsetor, nome, codigo FROM setor ORDER BY idsetor DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$setorClass = new setorClass();

    		#Atribui valores
		    $setorClass->setIdsetor($row['idsetor']);
		    $setorClass->setNome($row['nome']);
                    $setorClass->setCodigo($row['codigo']);
    		$lista[$i] = $setorClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM setor WHERE idsetor = ?');

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
