<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'aquisicao_has_materialClass.php');

class aquisicao_has_materialDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE aquisicao_has_material SET aquisicao_idaquisicao = ?, material_idmaterial = ?, quantidade = ?  WHERE material_idmaterial = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(1,$dados->getAquisicao_idaquisicao());
        $stmt->bindValue(2,$dados->getMaterial_idmaterial());
        $stmt->bindValue(3,$dados->getQuantidade());


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
            $stmt = $conexao->pdo->prepare('INSERT INTO aquisicao_has_material (aquisicao_idaquisicao, material_idmaterial, quantidade) VALUES (?,?,?)');



			$stmt->bindValue(1,$dados->getAquisicao_idaquisicao());
			$stmt->bindValue(2,$dados->getMaterial_idmaterial());
			$stmt->bindValue(3,$dados->getQuantidade());

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
	    $stmt = $conexao->pdo->prepare('SELECT aquisicao_idaquisicao, material_idmaterial, quantidade FROM aquisicao_has_material WHERE material_idmaterial = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	#Inst�ncia da entidade
    	$aquisicao_has_materialClass = new aquisicao_has_materialClass();

    	foreach( $retorno as $row ){

    		#Atribui valores
		    $aquisicao_has_materialClass->setAquisicao_idaquisicao($row['aquisicao_idaquisicao']);
		    $aquisicao_has_materialClass->setMaterial_idmaterial($row['material_idmaterial']);
		    $aquisicao_has_materialClass->setQuantidade($row['quantidade']);
    	}

    	return $aquisicao_has_materialClass;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT aquisicao_idaquisicao, material_idmaterial, quantidade FROM aquisicao_has_material ORDER BY material_idmaterial DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$aquisicao_has_materialClass = new aquisicao_has_materialClass();

    		#Atribui valores
		    $aquisicao_has_materialClass->setAquisicao_idaquisicao($row['aquisicao_idaquisicao']);
		    $aquisicao_has_materialClass->setMaterial_idmaterial($row['material_idmaterial']);
		    $aquisicao_has_materialClass->setQuantidade($row['quantidade']);

    		$lista[$i] = $aquisicao_has_materialClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM aquisicao_has_material WHERE material_idmaterial = ?');

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
