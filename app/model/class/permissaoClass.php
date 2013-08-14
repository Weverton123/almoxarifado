<?php

class permissaoClass{
    /*
    * Atributos
    */
    private $menu_idmenu;
    private $usuario_idusuario;

    /*
    * Propriedades dos atributos
    */

    public function setMenu_idmenu($menu_idmenu){
        $this->menu_idmenu = $menu_idmenu;
    }

    public function getMenu_idmenu(){
        return $this->menu_idmenu;
    }

    public function setUsuario_idusuario($usuario_idusuario){
        $this->usuario_idusuario = $usuario_idusuario;
    }

    public function getUsuario_idusuario(){
        return $this->usuario_idusuario;
    }
}

?>
