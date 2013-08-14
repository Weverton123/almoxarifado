<?php

/*
* Classe conexão DAO
* -------------------------------------
*/
class conexaoBanco {

	public $pdo = NULL;

	public function conectar(){
            
		// Conexao com MySQL via PDO
		$dsn = 'mysql:host=localhost;port=3306;dbname=novoalmoxarifado';
		$usuario = 'root';
		$senha = '123456';
		$opcoes = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_CASE => PDO::CASE_LOWER
		);

		try {
			$this->pdo = new PDO($dsn, $usuario, $senha, $opcoes);
		} catch (PDOException $e) {
			echo 'Erro: '.$e->getMessage();
		}
	}
}
?>
