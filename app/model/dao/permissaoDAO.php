<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

//require_once (BASEMODEL.'conexaoBD.php');
require_once (BASEMODELCLASS.'permissaoClass.php');

class permissaoDAO{

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
        $stmt = $conexao->pdo->prepare('UPDATE permissao SET menu_idmenu = ?, usuario_idusuario = ?  WHERE usuario_idusuario = ?');

        # Seta Atributos nulos


        # Parametros
        $stmt->bindValue(1,$dados->getMenu_idmenu());
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
    public function incluir($idmenu,$idusuario){
        # Faz conex�o
        $conexao = new conexaoBanco();
        $conexao->conectar();

        try{
            $stmt = $conexao->pdo->prepare('INSERT INTO permissao (menu_idmenu, usuario_idusuario) VALUES (?,?)');



			$stmt->bindValue(1,$idmenu);
			$stmt->bindValue(2,$idusuario);

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
	    $stmt = $conexao->pdo->prepare('SELECT menu_idmenu, usuario_idusuario FROM permissao WHERE usuario_idusuario = ? ');

	    # Passando os valores a serem usados
    	$dados = array($pk);
    	$stmt->execute($dados);
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lista = array();
        $i=0;
    	foreach( $retorno as $row ){
                #Inst�ncia da entidade
                $permissaoClass = new permissaoClass();
    		#Atribui valores
		    $permissaoClass->setMenu_idmenu($row['menu_idmenu']);
		    $permissaoClass->setUsuario_idusuario($row['usuario_idusuario']);
            $lista[$i] = $permissaoClass;
            $i++;
    	}

    	return $lista;
    }
    /*
    * Obtem todos
    */
    public function ObterPorTodos(){

    	# Faz conex�o
    	$conexao = new conexaoBanco();
    	$conexao->conectar();

    	# Executa comando SQL
    	$stmt = $conexao->pdo->prepare('SELECT menu_idmenu, usuario_idusuario FROM permissao ORDER BY usuario_idusuario DESC');

    	// Executa Query
    	$stmt->execute();
    	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	$lista = array();
    	$i = 0;

    	foreach( $retorno as $row ){
    		#Inst�ncia da entidade
    		$permissaoClass = new permissaoClass();

    		#Atribui valores
		    $permissaoClass->setMenu_idmenu($row['menu_idmenu']);
		    $permissaoClass->setUsuario_idusuario($row['usuario_idusuario']);

    		$lista[$i] = $permissaoClass;
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
		$stmt = $conexao->pdo->prepare('DELETE FROM permissao WHERE usuario_idusuario = ?');

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
