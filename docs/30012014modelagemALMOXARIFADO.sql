SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `novoalmoxarifado` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
CREATE SCHEMA IF NOT EXISTS `almoxarifado` DEFAULT CHARACTER SET latin1 ;
USE `novoalmoxarifado` ;

-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`setor` (
  `codigo` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`tipousuario` (
  `idtipousuario` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(60) NOT NULL,
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC),
  PRIMARY KEY (`idtipousuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(20) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `setor_codigo` VARCHAR(45) NOT NULL,
  `tipousuario_idtipousuario` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  INDEX `fk_usuario_setor1_idx` (`setor_codigo` ASC),
  INDEX `fk_usuario_tipousuario1_idx` (`tipousuario_idtipousuario` ASC),
  CONSTRAINT `fk_usuario_setor1`
    FOREIGN KEY (`setor_codigo`)
    REFERENCES `novoalmoxarifado`.`setor` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipousuario1`
    FOREIGN KEY (`tipousuario_idtipousuario`)
    REFERENCES `novoalmoxarifado`.`tipousuario` (`idtipousuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `codigo` INT NOT NULL,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`material` (
  `idmaterial` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `detalhes` TEXT NULL,
  `quantidadeatual` INT NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `categoria_codigo` INT NOT NULL,
  PRIMARY KEY (`idmaterial`),
  INDEX `fk_material_categoria1_idx` (`categoria_codigo` ASC),
  CONSTRAINT `fk_material_categoria1`
    FOREIGN KEY (`categoria_codigo`)
    REFERENCES `novoalmoxarifado`.`categoria` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`status` (
  `idstatus` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idstatus`),
  UNIQUE INDEX `status_UNIQUE` (`status` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`requisicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`requisicao` (
  `idrequisicao` INT NOT NULL AUTO_INCREMENT,
  `momento` TIMESTAMP NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  `status_idstatus` INT NOT NULL,
  PRIMARY KEY (`idrequisicao`),
  INDEX `fk_requisicao_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_requisicao_status1_idx` (`status_idstatus` ASC),
  CONSTRAINT `fk_requisicao_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `novoalmoxarifado`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_status1`
    FOREIGN KEY (`status_idstatus`)
    REFERENCES `novoalmoxarifado`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`requisicao_has_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`requisicao_has_material` (
  `qtdentregue` INT NOT NULL DEFAULT 0,
  `status_idstatus` INT NOT NULL,
  `material_idmaterial` INT NOT NULL,
  `requisicao_idrequisicao` INT NOT NULL,
  `idrequisicao_has_material` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_requisicao_has_material_status1_idx` (`status_idstatus` ASC),
  INDEX `fk_requisicao_has_material_material1_idx` (`material_idmaterial` ASC),
  PRIMARY KEY (`idrequisicao_has_material`),
  CONSTRAINT `fk_requisicao_has_material_status1`
    FOREIGN KEY (`status_idstatus`)
    REFERENCES `novoalmoxarifado`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_has_material_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `novoalmoxarifado`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_has_material_requisicao1`
    FOREIGN KEY (`requisicao_idrequisicao`)
    REFERENCES `novoalmoxarifado`.`requisicao` (`idrequisicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`menu` (
  `idmenu` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(25) NOT NULL,
  `link` VARCHAR(40) NOT NULL,
  `action` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmenu`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `link_UNIQUE` (`link` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`permissao` (
  `usuario_idusuario` INT NOT NULL,
  `menu_idmenu` INT NOT NULL,
  INDEX `fk_permissao_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_permissao_menu1_idx` (`menu_idmenu` ASC),
  CONSTRAINT `fk_permissao_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `novoalmoxarifado`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao_menu1`
    FOREIGN KEY (`menu_idmenu`)
    REFERENCES `novoalmoxarifado`.`menu` (`idmenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`movimentacao_estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novoalmoxarifado`.`movimentacao_estoque` (
  `data_movimentacao` DATETIME NOT NULL,
  `quantidade_inserida` INT NOT NULL DEFAULT 0,
  `quantidade_retirada` INT NOT NULL DEFAULT 0,
  `quantidade_atual_mov` INT NOT NULL,
  `material_idmaterial` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  INDEX `fk_gerenciamento_estoque_material1_idx` (`material_idmaterial` ASC),
  INDEX `fk_gerenciamento_estoque_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_gerenciamento_estoque_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `novoalmoxarifado`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gerenciamento_estoque_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `novoalmoxarifado`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `almoxarifado` ;

-- -----------------------------------------------------
-- Table `almoxarifado`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`aluno` (
  `num_insc` INT(4) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `tel1` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `tel2` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `instituicao` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `data` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`num_insc`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`aquisicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`aquisicao` (
  `codigo_produto` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `qtd_entrada` INT(5) NULL DEFAULT NULL,
  `data_entrada` DATE NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`codigo_produto`, `data_entrada`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`grupos` (
  `codigo_grupo` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `descricao_grupo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`codigo_grupo`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`itens_movimentacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`itens_movimentacoes` (
  `identificador` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `codigo_produto` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `quantidade_saida` INT(5) NOT NULL DEFAULT '0',
  `data_movimentacao` DATE NULL DEFAULT NULL,
  `codigo_setor` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`identificador`, `codigo_produto`, `codigo_setor`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`itens_requisicoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`itens_requisicoes` (
  `identificador` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `codigo_produto` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `quantidade` INT(5) NOT NULL DEFAULT '0',
  `setor` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`identificador`, `setor`, `codigo_produto`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`movimentacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`movimentacoes` (
  `data_movimentacao` DATE NULL DEFAULT NULL,
  `setor_responsavel` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `responsavel_setor` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `operador_responsavel` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `identificador` VARCHAR(12) CHARACTER SET 'latin1' NOT NULL DEFAULT '',
  PRIMARY KEY (`identificador`, `setor_responsavel`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`operadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`operadores` (
  `login` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `nome_operador` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `senha_operador` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `tipo` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `setor` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`login`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`produtos` (
  `codigo_produto` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `grupo_produto` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `descricao_produto` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `estoque_atual` INT(5) NULL DEFAULT '0',
  `data_ultima_entrada` DATE NULL DEFAULT NULL,
  `qtd_ultima_entrada` INT(5) NULL DEFAULT '0',
  `data_ultima_saida` DATE NULL DEFAULT NULL,
  `qtd_ultima_saida` INT(5) NULL DEFAULT '0',
  PRIMARY KEY (`codigo_produto`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`requisicoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`requisicoes` (
  `identificador` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `data` DATE NULL DEFAULT NULL,
  `setor` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `operador` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `atendida` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`identificador`, `setor`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `almoxarifado`.`setores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`setores` (
  `codigo_setor` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `descricao_setor` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`codigo_setor`),
  UNIQUE INDEX `codigo_setor` (`codigo_setor` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
