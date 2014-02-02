SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `almoxarifado` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `almoxarifado` ;

-- -----------------------------------------------------
-- Table `almoxarifado`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`setor` (
  `idsetor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idsetor`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`tipousuario` (
  `idtipousuario` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipousuario`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`usuario` (
  `login` VARCHAR(20) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `setor_idsetor` INT NOT NULL,
  `tipousuario_idtipousuario` INT NOT NULL,
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_usuario_setor` (`setor_idsetor` ASC),
  INDEX `fk_usuario_tipousuario1` (`tipousuario_idtipousuario` ASC),
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  CONSTRAINT `fk_usuario_setor`
    FOREIGN KEY (`setor_idsetor`)
    REFERENCES `almoxarifado`.`setor` (`idsetor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipousuario1`
    FOREIGN KEY (`tipousuario_idtipousuario`)
    REFERENCES `almoxarifado`.`tipousuario` (`idtipousuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`material` (
  `idmaterial` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `detalhes` TEXT NULL,
  `quantidadeatual` INT NOT NULL,
  `categoria_idcategoria` INT NOT NULL,
  `data_cadastro` DATE NOT NULL,
  PRIMARY KEY (`idmaterial`),
  INDEX `fk_material_categoria1` (`categoria_idcategoria` ASC),
  CONSTRAINT `fk_material_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `almoxarifado`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`status` (
  `idstatus` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idstatus`),
  UNIQUE INDEX `status_UNIQUE` (`status` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`requisicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`requisicao` (
  `idrequisicao` INT NOT NULL AUTO_INCREMENT,
  `momento` TIMESTAMP NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  `status_idstatus` INT NOT NULL,
  PRIMARY KEY (`idrequisicao`),
  INDEX `fk_requisicao_usuario1` (`usuario_idusuario` ASC),
  INDEX `fk_requisicao_status1` (`status_idstatus` ASC),
  CONSTRAINT `fk_requisicao_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `almoxarifado`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_status1`
    FOREIGN KEY (`status_idstatus`)
    REFERENCES `almoxarifado`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`requisicao_has_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`requisicao_has_material` (
  `qtdentregue` INT NOT NULL DEFAULT 0,
  `status_idstatus` INT NOT NULL,
  `material_idmaterial` INT NOT NULL,
  `requisicao_idrequisicao` INT NOT NULL,
  `idrequisicao_has_material` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_requisicao_has_material_status1` (`status_idstatus` ASC),
  INDEX `fk_requisicao_has_material_material1` (`material_idmaterial` ASC),
  PRIMARY KEY (`idrequisicao_has_material`),
  CONSTRAINT `fk_requisicao_has_material_status1`
    FOREIGN KEY (`status_idstatus`)
    REFERENCES `almoxarifado`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_has_material_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `almoxarifado`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_has_material_requisicao1`
    FOREIGN KEY (`requisicao_idrequisicao`)
    REFERENCES `almoxarifado`.`requisicao` (`idrequisicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`menu` (
  `idmenu` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(25) NOT NULL,
  `link` VARCHAR(40) NOT NULL,
  `action` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmenu`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `link_UNIQUE` (`link` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`permissao` (
  `usuario_idusuario` INT NOT NULL,
  `menu_idmenu` INT NOT NULL,
  INDEX `fk_permissao_usuario1` (`usuario_idusuario` ASC),
  INDEX `fk_permissao_menu1` (`menu_idmenu` ASC),
  CONSTRAINT `fk_permissao_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `almoxarifado`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao_menu1`
    FOREIGN KEY (`menu_idmenu`)
    REFERENCES `almoxarifado`.`menu` (`idmenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almoxarifado`.`gerenciamento_estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `almoxarifado`.`gerenciamento_estoque` (
  `data_movimentacao` DATETIME NOT NULL,
  `quantidade_inserida` INT NOT NULL,
  `quantidade_atual_mov` INT NOT NULL,
  `material_idmaterial` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  `idrequisicao_has_material` INT NULL,
  INDEX `fk_gerenciamento_estoque_material1` (`material_idmaterial` ASC),
  INDEX `fk_gerenciamento_estoque_usuario1` (`usuario_idusuario` ASC),
  INDEX `fk_gerenciamento_estoque_requisicao_has_material1` (`idrequisicao_has_material` ASC),
  CONSTRAINT `fk_gerenciamento_estoque_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `almoxarifado`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gerenciamento_estoque_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `almoxarifado`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gerenciamento_estoque_requisicao_has_material1`
    FOREIGN KEY (`idrequisicao_has_material`)
    REFERENCES `almoxarifado`.`requisicao_has_material` (`idrequisicao_has_material`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
