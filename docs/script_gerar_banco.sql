SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`setor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`setor` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`setor` (
  `idsetor` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idsetor`) ,
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`tipousuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`tipousuario` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`tipousuario` (
  `idtipousuario` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipousuario`) ,
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`usuario` (
  `login` VARCHAR(20) NOT NULL ,
  `nome` VARCHAR(255) NOT NULL ,
  `matricula` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(20) NOT NULL ,
  `setor_idsetor` INT NOT NULL ,
  `tipousuario_idtipousuario` INT NOT NULL ,
  `idusuario` INT NOT NULL AUTO_INCREMENT ,
  UNIQUE INDEX `matricula_UNIQUE` (`matricula` ASC) ,
  INDEX `fk_usuario_setor` (`setor_idsetor` ASC) ,
  INDEX `fk_usuario_tipousuario1` (`tipousuario_idtipousuario` ASC) ,
  PRIMARY KEY (`idusuario`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  CONSTRAINT `fk_usuario_setor`
    FOREIGN KEY (`setor_idsetor` )
    REFERENCES `novoalmoxarifado`.`setor` (`idsetor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipousuario1`
    FOREIGN KEY (`tipousuario_idtipousuario` )
    REFERENCES `novoalmoxarifado`.`tipousuario` (`idtipousuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`categoria` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idcategoria`) ,
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`material` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`material` (
  `idmaterial` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `detalhes` TEXT NULL ,
  `quantidadeatual` INT NOT NULL ,
  `categoria_idcategoria` INT NOT NULL ,
  PRIMARY KEY (`idmaterial`) ,
  INDEX `fk_material_categoria1` (`categoria_idcategoria` ASC) ,
  CONSTRAINT `fk_material_categoria1`
    FOREIGN KEY (`categoria_idcategoria` )
    REFERENCES `novoalmoxarifado`.`categoria` (`idcategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`status` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`status` (
  `idstatus` INT NOT NULL AUTO_INCREMENT ,
  `status` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idstatus`) ,
  UNIQUE INDEX `status_UNIQUE` (`status` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`requisicao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`requisicao` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`requisicao` (
  `idrequisicao` INT NOT NULL AUTO_INCREMENT ,
  `momento` TIMESTAMP NOT NULL ,
  `usuario_idusuario` INT NOT NULL ,
  `status_idstatus` INT NOT NULL ,
  PRIMARY KEY (`idrequisicao`) ,
  INDEX `fk_requisicao_usuario1` (`usuario_idusuario` ASC) ,
  INDEX `fk_requisicao_status1` (`status_idstatus` ASC) ,
  CONSTRAINT `fk_requisicao_usuario1`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `novoalmoxarifado`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_status1`
    FOREIGN KEY (`status_idstatus` )
    REFERENCES `novoalmoxarifado`.`status` (`idstatus` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`aquisicao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`aquisicao` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`aquisicao` (
  `idaquisicao` INT NOT NULL AUTO_INCREMENT ,
  `momento` TIMESTAMP NOT NULL ,
  `usuario_idusuario` INT NOT NULL ,
  PRIMARY KEY (`idaquisicao`) ,
  INDEX `fk_aquisicao_usuario1` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_aquisicao_usuario1`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `novoalmoxarifado`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`requisicao_has_material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`requisicao_has_material` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`requisicao_has_material` (
  `requisicao_idrequisicao` INT NOT NULL ,
  `material_idmaterial` INT NOT NULL ,
  `qtdrequisitada` INT NOT NULL ,
  `qtdentregue` INT NOT NULL DEFAULT 0 ,
  `status_idstatus` INT NOT NULL ,
  PRIMARY KEY (`requisicao_idrequisicao`, `material_idmaterial`) ,
  INDEX `fk_requisicao_has_material_material1` (`material_idmaterial` ASC) ,
  INDEX `fk_requisicao_has_material_requisicao1` (`requisicao_idrequisicao` ASC) ,
  INDEX `fk_requisicao_has_material_status1` (`status_idstatus` ASC) ,
  CONSTRAINT `fk_requisicao_has_material_requisicao1`
    FOREIGN KEY (`requisicao_idrequisicao` )
    REFERENCES `novoalmoxarifado`.`requisicao` (`idrequisicao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_has_material_material1`
    FOREIGN KEY (`material_idmaterial` )
    REFERENCES `novoalmoxarifado`.`material` (`idmaterial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisicao_has_material_status1`
    FOREIGN KEY (`status_idstatus` )
    REFERENCES `novoalmoxarifado`.`status` (`idstatus` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`aquisicao_has_material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`aquisicao_has_material` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`aquisicao_has_material` (
  `aquisicao_idaquisicao` INT NOT NULL ,
  `material_idmaterial` INT NOT NULL ,
  `quantidade` INT NOT NULL ,
  PRIMARY KEY (`aquisicao_idaquisicao`, `material_idmaterial`) ,
  INDEX `fk_aquisicao_has_material_material1` (`material_idmaterial` ASC) ,
  INDEX `fk_aquisicao_has_material_aquisicao1` (`aquisicao_idaquisicao` ASC) ,
  CONSTRAINT `fk_aquisicao_has_material_aquisicao1`
    FOREIGN KEY (`aquisicao_idaquisicao` )
    REFERENCES `novoalmoxarifado`.`aquisicao` (`idaquisicao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aquisicao_has_material_material1`
    FOREIGN KEY (`material_idmaterial` )
    REFERENCES `novoalmoxarifado`.`material` (`idmaterial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`menu` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`menu` (
  `idmenu` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`idmenu`) ,
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `novoalmoxarifado`.`permissao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `novoalmoxarifado`.`permissao` ;

CREATE  TABLE IF NOT EXISTS `novoalmoxarifado`.`permissao` (
  `menu_idmenu` INT NOT NULL ,
  `usuario_idusuario` INT NOT NULL ,
  PRIMARY KEY (`menu_idmenu`, `usuario_idusuario`) ,
  INDEX `fk_aba_has_usuario_usuario1` (`usuario_idusuario` ASC) ,
  INDEX `fk_aba_has_usuario_aba1` (`menu_idmenu` ASC) ,
  CONSTRAINT `fk_aba_has_usuario_aba1`
    FOREIGN KEY (`menu_idmenu` )
    REFERENCES `novoalmoxarifado`.`menu` (`idmenu` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aba_has_usuario_usuario1`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `novoalmoxarifado`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
