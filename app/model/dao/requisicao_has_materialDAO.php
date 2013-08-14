<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'requisicao_has_materialClass.php');

class requisicao_has_materialDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE requisicao_has_material SET requisicao_idrequisicao = ?, material_idmaterial = ?, qtdrequisitada = ?, qtdentregue = ?, status_idstatus = ?  WHERE material_idmaterial = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(1,$dados->getRequisicao_idrequisicao());
        $stmt->bindValue(2,$dados->getMaterial_idmaterial());
        $stmt->bindValue(3,$dados->getQtdrequisitada());
        $stmt->bindValue(4,$dados->getQtdentregue());
        $stmt->bindValue(5,$dados->getStatus_idstatus());


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
            $stmt = $conexao->pdo->prepare('INSERT INTO requisicao_has_material (requisicao_idrequisicao, material_idmaterial, qtdrequisitada, qtdentregue, status_idstatus) VALUES (?,?,?,?,?)');



			$stmt->bindValue(1,$dados->getRequisicao_idrequisicao());
			$stmt->bindValue(2,$dados->getMaterial_idmaterial());
			$stmt->bindValue(3,$dados->getQtdrequisitada());
			$stmt->bindValue(4,$dados->getQtdentregue());
			$stmt->bindValue(5,$dados->getStatus_idstatus());

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
	    $stmt = $conexao->pdo->prepare('SELECT requisicao_idrequisicao, material_idmaterial, qtdrequisitada, qtdentregue, status_idstatus FROM requisicao_has_material WHERE material_idmaterial = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	#Inst�ncia da entidade
    	$requisicao_has_materialClass = new requisicao_has_materialClass();

    	foreach( $retorno as $row ){

    		#Atribui valores
		    $requisicao_has_materialClass->setRequisicao_idrequisicao($row['requisicao_idrequisicao']);
		    $requisicao_has_materialClass->setMaterial_idmaterial($row['material_idmaterial']);
		    $requisicao_has_materialClass->setQtdrequisitada($row['qtdrequisitada']);
		    $requisicao_has_materialClass->setQtdentregue($row['qtdentregue']);
		    $requisicao_has_materialClass->setStatus_idstatus($row['status_idstatus']);
    	}

    	return $requisicao_has_materialClass;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT requisicao_idrequisicao, material_idmaterial, qtdrequisitada, qtdentregue, status_idstatus FROM requisicao_has_material ORDER BY material_idmaterial DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$requisicao_has_materialClass = new requisicao_has_materialClass();

    		#Atribui valores
		    $requisicao_has_materialClass->setRequisicao_idrequisicao($row['requisicao_idrequisicao']);
		    $requisicao_has_materialClass->setMaterial_idmaterial($row['material_idmaterial']);
		    $requisicao_has_materialClass->setQtdrequisitada($row['qtdrequisitada']);
		    $requisicao_has_materialClass->setQtdentregue($row['qtdentregue']);
		    $requisicao_has_materialClass->setStatus_idstatus($row['status_idstatus']);

    		$lista[$i] = $requisicao_has_materialClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM requisicao_has_material WHERE material_idmaterial = ?');

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
