<?php  if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'tipousuarioClass.php');

class tipousuarioDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE tipousuario SET tipo = ?  WHERE idtipousuario = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(2,$dados->getIdtipousuario());
        $stmt->bindValue(1,$dados->getTipo());


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
            $stmt = $conexao->pdo->prepare('INSERT INTO tipousuario (tipo) VALUES (?)');



			$stmt->bindValue(1,$dados->getTipo());

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
	    $stmt = $conexao->pdo->prepare('SELECT idtipousuario, tipo FROM tipousuario WHERE idtipousuario = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	#Inst�ncia da entidade
    	$tipousuarioClass = new tipousuarioClass();

    	foreach( $retorno as $row ){

    		#Atribui valores
		    $tipousuarioClass->setIdtipousuario($row['idtipousuario']);
		    $tipousuarioClass->setTipo($row['tipo']);
    	}

    	return $tipousuarioClass;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT idtipousuario, tipo FROM tipousuario ORDER BY idtipousuario DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$tipousuarioClass = new tipousuarioClass();

    		#Atribui valores
		    $tipousuarioClass->setIdtipousuario($row['idtipousuario']);
		    $tipousuarioClass->setTipo($row['tipo']);

    		$lista[$i] = $tipousuarioClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM tipousuario WHERE idtipousuario = ?');

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
