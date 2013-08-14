<?php
/**
 * Description of seguranca
 *
 * @author italo
 */
class seguranca {
 
    public function seguranca_arq($arquivo){
	
	if(basename($_SERVER["PHP_SELF"])== $arquivo){
		
		exit("<script>alert('Acesso nao permitido')</script>\n
                     <script>window.location=('index.php')</script>");	
        	}
	}
        public function redirecionar($local=null,$retorno=null){
           header('location:  '.($local!=null?$local:'index').'.php'.$retorno);
	}
}

?>
