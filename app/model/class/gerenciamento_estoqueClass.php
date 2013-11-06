<?php if(!defined('BASEPATH')) exit(header('Location: ./../../../index.php'));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gerenciamento_estoque
 *
 * @author italo
 */
class gerenciamento_estoque {

    private $usuario_idusuario;
    private $material_idmaterial;
    private $data_movimentacao;
    private $quantidade_inserida;
    private $quantidade_retirada;
    private $quantidade_atual_mov;
    
    function setUsuario_idusuario($usuario_idusuario){
        $this->usuario_idusuario = $usuario_idusuario;
    }
    function getUsuario_idusuario(){
        return $this->usuario_idusuario;
    }
    
    function setMaterial_idmaterial($material_idmaterial){
        $this->material_idmaterial = $material_idmaterial;
    }
    function getMaterial_idmaterial(){
        return $this->material_idmaterial;
    }
    
    function setData_movimentacao($data_movimentacao){
        $this->data_movimentacao = $data_movimentacao;
    }
    function getData_movimentacao(){
        return $this->data_movimentacao;
    }
    
    function setQuantidade_inserida($quantidade_inserida){
        $this->quantidade_inserida = $quantidade_inserida;
    }
    function getQuantidade_inserida(){
        return $this->quantidade_inserida;
    }
    
    function setQuantidade_retirada($quantidade_retirada){
        $this->quantidade_retirada = $quantidade_retirada;
    }
    function getQuantidade_retirada(){
        return $this->quantidade_retirada;
    }
    
    function setQuantidade_atual_mov($quantidade_atual_mov){
        $this->quantidade_atual_mov = $quantidade_atual_mov;
    }
    function getQuantidade_atual_mov(){
        return $this->quantidade_atual_mov;
    }
}

?>
