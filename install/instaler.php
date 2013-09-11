<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

if(isset($_REQUEST['install'])){
if(ini_get('allow_url_fopen') == 1){
// Abre ou cria o arquivo exemplo1.txt
        // "a" representa que o arquivo é aberto para ser escrito
         $fp = fopen(BASESYSTEM."configDB.php", "w+");     
        //$fp = file_get_contents('test.php');
    
         if($fp){
// Escreve "primeiro exemplo" no exemplo1.txt
        $escreve = fwrite($fp, 
"<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');

/**
 * Description of config
 *
 * @author italo
 */
  class configDB{

            protected \$db_host  = '{$_REQUEST['host']}';
            protected \$db_driver = 'mysql';
            protected \$db_port ='{$_REQUEST['port']}';
            protected \$db_user = '{$_REQUEST['user']}';
            protected \$db_senha = '{$_REQUEST['senha']}';
            protected \$db_name = '{$_REQUEST['dbname']}';
   }");

        fclose($fp);
        
            echo 'criado com sucesso!';
                 }
            else {
          echo 'Falha ao tentar abrir arquivo!';    
         }
 
    }
    else {
           echo 'fopen desativo!';
        }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instalação Almoxarifado</title>
<style type="text/css">
body{ font-size:15px; font-family: cursive }
h1{color:#0063DC }
a { color:#3366FF}
.sboxinstall {
    background-color: rgba(0, 0, 11, 0.8);
    background: rgba(0, 0, 11, 0.08);
    color: rgba(0, 0, 15, 0.6);
    
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;}
.boxinstall{
    background: rgba(0, 0, 100, 0.25);
    
    margin: 5% 35%;
    width: 200px;
    height: 250px; 
    border:solid 1px #3366FF; 
    padding:10px 50px 100px;
    text-align:center;
    
    -moz-box-shadow: 5px  6px  33px  #3366FF;
    -webkit-box-shadow: 5px  6px  33px  #3366FF;
    box-shadow: 5px  6px  33px  #3366FF;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

.submit{

    background: blue;
    cursor: pointer;
    width: 90px;
    height: 20px; 
    border:solid 1px #3366FF;
    text-align:center;
    font-size: 15px;
    font-family: cursive;
    -moz-box-shadow: 5px  6px  33px  #3366FF;
    -webkit-box-shadow: 5px  6px  33px  #3366FF;
    box-shadow: 5px  6px  33px  #3366FF;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}
</style>
</head>
    <body>
        <h1>Instalação sistema almoxarifado...</h1>
        <div class="boxinstall"> 
            <h3>Passo 1</h3>
            <form action="" method="POST">
                Host:<br><input type="text" name="host" /><br>
                Porta:<br><input type="text" name="port" /><br>
                Usuario:<br><input type="text" name="user" /><br>
                Senha:<br><input type="text" name="senha" /><br>
                DbName:<br><input type="text" name="dbname" /><br>
                <input type="submit" class="submit" name="install" value="Próximo" />
            </form>
        </div>
        
	<form id="custom">
				<fieldset title="Thread 1">
					<legend>description one</legend>

					<label>User:</label>
					<!-- Hidden fields are not focused.  -->
					<input type="hidden" name="hidden" />

					<!-- Disabled fields are not validated.  -->
					<input type="text" value="wbotelhos" size="40" name="user" disabled="disabled" />

					<label>E-mail:</label>
					<input type="text" size="40" name="email" />
					<input type="checkbox" name="checked" /> Checked?

					<label>Newsletter?</label>
					<input type="radio" name="newsletter" /> Yep
					<input type="radio" name="newsletter" /> Nop

					<label>Password:</label>
					<input type="password" name="password" size="40" />
				</fieldset>

				<fieldset title="Thread 2">
					<legend>description two</legend>

					<label>Nick Name:</label>
					<input type="text" size="30" />

					<label>Bio:</label>
					<textarea name="bio" rows="5" cols="60"></textarea>
				</fieldset>
	
				<fieldset title="Thread 3">
					<legend>description three</legend>

					<label>Birthday:</label>
					<select name="day">
						<option></option>
						<option>23</option>
					</select>

					<select>
						<option>10</option>
					</select>

					<select>
						<option>1984</option>
					</select>

					<label>Site:</label>
					<input type="text" name="site" size="40" />
				</fieldset>
	
				<input type="submit" class="finish" value="Finish!" />
			</form>
    </body>
</html>
 
 
 
 
 
 