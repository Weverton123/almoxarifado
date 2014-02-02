<?php if(!defined('BASEPATH')) exit('Falha no carregamento do script!');
/**
 * Description of core
 *
 * @author italo
 */

//Garante o limite para session expirar
if(isset($_SESSION['session']['logado']['time_limit_session'])){
    $tempo_limit = time() - TEMPOSESSAO;
    if ($_SESSION['session']['logado']["time_limit_session"] < $tempo_limit) { 
                stopSession('session');
		$_SESSION['msg'] = "Sua sessão expirou!";
		redirecionar();
                
    }
    else{
        //atualiza a sessão reiniciando o tempo da sessão
        $_SESSION['session']['logado']['time_limit_session'] = time();
        date_default_timezone_set('Brazil/DeNoronha');
        #echo 'Sua sessão expira às: '.date('H:i:s',$_SESSION['session']['logado']['time_limit_session']+TEMPOSESSAO);
    }
        
}
//Garante o limite para session expirar

function seguranca_arq(){
    #echo 'Segurança ativa!';
           $array_url = explode("/", $_SERVER["REQUEST_URI"]);
           //Garante que não existam controles nem ações repetidas
           $array_url = array_unique($array_url);
           #var_dump($array_url);
    
           if(isset($_SESSION['session']['logado'])){//verifica se usuario está logado e para verificar se ele tem acesso a página
           $perm_usu = $_SESSION['session']['logado']['permissao']['action'];
           #var_dump($perm_usu);

           $acesso = FALSE;
           foreach ($perm_usu as $perm){
            #echo 'link_verify: '.$perm['link'].' - '.$array_url[3].'<br>';

               if($perm['link']== $array_url[3]){
                  $acesso = TRUE;
                  #echo 'link_verify:'.$perm['link'].'-'.$array_url[3];
                  break;
               }
           }
           if(!$acesso){
               #echo ' Acao nao permitida!';
                $_SESSION['msg'] =' Ação não permitida!';
                redirecionar('menu/minhaarea');
               exit();
           }
           
        }
        else{
            #echo 'nao logado';
            
            if($array_url[3]== 'quemsomos' || $array_url[3]== 'faleconosco');
            else    redirecionar('menu/index');
        }
        
        
    }
    
   function startCookie($name,$value,$expire){
       #Inicia o cookie
        setcookie($name, $value, $expire);
   
   }
   function stopCookie($name){
       #Encerra o cookie
        setcookie($name,NULL,-1);
   } 
  
   //criar sessão NÃO FOI TOTALMENTE TESTADO FUNCIONAMENTO INCERTO
   function startSession($nomeDaSessao=NULL,$time=30,$cache_limiter='private'){
          /* Define o limitador de cache para 'private' */
          session_cache_limiter($cache_limiter);

          /* Define o limite de tempo do cache em minutos */
          session_cache_expire($time);
          //session_cache_expire();

          /* Define um nome para sessão */
          session_name($nomeDaSessao);

          /* Define o local do arquivo da session*/
          #session_save_path(BASETEMP);

          /* Inicia a sessão */
          session_start();     
       }//
       
   function stopSession($nomeDaSessao = NULL){
          if($nomeDaSessao==NULL)
              session_destroy();
          else 
              unset($_SESSION[$nomeDaSessao]);
   }
   
   //carrega todos os Css's de uma pasta  
   function allLoadCss($path){
      
    $diretorio = dir($path);

    while($arquivo = $diretorio -> read()){
       //verifica apenas as extenções do css 
        if(strpos($arquivo, '.css')!==FALSE)
          echo ("<link  rel='stylesheet' href='".BARRA.url_base.BARRA.$path.$arquivo."' type='text/css' />\n");
    }
    $diretorio -> close();

  }
  //carrega todos os Js's de uma pasta  
  function allLoadJs($path){
      
    $diretorio = dir($path);

    while($arquivo = $diretorio -> read()){
       //verifica apenas as extenções do css 
        if(strpos($arquivo, '.js')!==FALSE)
          echo ("<script  src='".BARRA.url_base.BARRA.$path.$arquivo."' type='text/javascript'></script>\n");
    }
    $diretorio -> close();

  }  
  //carrega o Css  
  function loadCss($arquivoCss){ 
        if(file_exists(BASECSS.$arquivoCss.'.css')) 
        return print ('<link  rel="stylesheet" href="'.BARRA.url_base.BARRA.BASECSS.$arquivoCss.'.css" type="text/css" />');
       else
        return print ("Falha no carregamento do arquivo {$arquivoCss}.css");
  }
  //carrega o js
  function loadJs($arquivoJs){ 
     if(file_exists(BASEJS.$arquivoJs.'.js')) 
     return print ('<script  src="'.BARRA.url_base.BARRA.BASEJS.$arquivoJs.'.js" type="text/javascript"></script>');
     else
     return print ("Falha no carregamento do arquivo {$arquivoJs}.js");
  }
  //redireciona
  function redirecionar($local=null){
           header('location:  /'.url_base.BARRA.$local);
    }
  function alert($msg){
      echo "<script>
                alert($msg);
            </script>";
  }  
  function imprimir($content){
      var_dump($content);
  }
 