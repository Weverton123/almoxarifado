<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'aquisicaoClass.php');

class aquisicaoDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE aquisicao SET momento = ?, usuario_idusuario = ?  WHERE idaquisicao = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(3,$dados->getIdaquisicao());
        $stmt->bindValue(1,$dados->getMomento());
        $stmt->bindValue(2,$dados->getUsuario_idusuario());


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
            $stmt = $conexao->pdo->prepare('INSERT INTO aquisicao (momento, usuario_idusuario) VALUES (?,?)');



			$stmt->bindValue(1,$dados->getMomento());
			$stmt->bindValue(2,$dados->getUsuario_idusuario());

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
	    $stmt = $conexao->pdo->prepare('SELECT idaquisicao, momento, usuario_idusuario FROM aquisicao WHERE idaquisicao = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	#Inst�ncia da entidade
    	$aquisicaoClass = new aquisicaoClass();

    	foreach( $retorno as $row ){

    		#Atribui valores
		    $aquisicaoClass->setIdaquisicao($row['idaquisicao']);
		    $aquisicaoClass->setMomento($row['momento']);
		    $aquisicaoClass->setUsuario_idusuario($row['usuario_idusuario']);
    	}

    	return $aquisicaoClass;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT idaquisicao, momento, usuario_idusuario FROM aquisicao ORDER BY idaquisicao DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$aquisicaoClass = new $aquisicaoClass();

    		#Atribui valores
		    $aquisicaoClass->setIdaquisicao($row['idaquisicao']);
		    $aquisicaoClass->setMomento($row['momento']);
		    $aquisicaoClass->setUsuario_idusuario($row['usuario_idusuario']);

    		$lista[$i] = $aquisicaoClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM aquisicao WHERE idaquisicao = ?');

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
