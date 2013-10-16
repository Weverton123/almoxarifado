<?php if(!defined('BASEPATH')) exit(header('Location: ./../../../index.php'));

require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'requisicaoClass.php');

class requisicaoDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE requisicao SET momento = ?, usuario_idusuario = ?, status_idstatus = ?  WHERE idrequisicao = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(4,$dados->getIdrequisicao());
        $stmt->bindValue(1,$dados->getMomento());
        $stmt->bindValue(2,$dados->getUsuario_idusuario());
        $stmt->bindValue(3,$dados->getStatus_idstatus());


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
            $stmt = $conexao->pdo->prepare('INSERT INTO requisicao (momento, usuario_idusuario, status_idstatus) VALUES (?,?,?)');



			$stmt->bindValue(1,$dados->getMomento());
			$stmt->bindValue(2,$dados->getUsuario_idusuario());
			$stmt->bindValue(3,$dados->getStatus_idstatus());

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
	    $stmt = $conexao->pdo->prepare('SELECT idrequisicao, momento, usuario_idusuario, status_idstatus FROM requisicao WHERE idrequisicao = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	#Inst�ncia da entidade
    	$requisicaoClass = new requisicaoClass();

    	foreach( $retorno as $row ){

    		#Atribui valores
		    $requisicaoClass->setIdrequisicao($row['idrequisicao']);
		    $requisicaoClass->setMomento($row['momento']);
		    $requisicaoClass->setUsuario_idusuario($row['usuario_idusuario']);
		    $requisicaoClass->setStatus_idstatus($row['status_idstatus']);
    	}

    	return $requisicaoClass;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT idrequisicao, momento, usuario_idusuario, status_idstatus FROM requisicao ORDER BY idrequisicao DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$requisicaoClass = new $requisicaoClass();

    		#Atribui valores
		    $requisicaoClass->setIdrequisicao($row['idrequisicao']);
		    $requisicaoClass->setMomento($row['momento']);
		    $requisicaoClass->setUsuario_idusuario($row['usuario_idusuario']);
		    $requisicaoClass->setStatus_idstatus($row['status_idstatus']);

    		$lista[$i] = $requisicaoClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM requisicao WHERE idrequisicao = ?');

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
