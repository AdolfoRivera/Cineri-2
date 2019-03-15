-- MySQL Workbench Forward Engineering

DROP DATABASE cine;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Cine
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Cine
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Cine` DEFAULT CHARACTER SET utf8 ;
USE `Cine` ;

-- -----------------------------------------------------
-- Table `Cine`.`Precios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Precios` (
  `idPrecios` INT NOT NULL auto_increment,
  `idPeliculas` INT NULL,
  `Tradicional` FLOAT NULL,
  `3D` FLOAT NULL,
  PRIMARY KEY (`idPrecios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`imagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`imagen` (
  `idimagen` INT NOT NULL auto_increment,
  `idPeliculas` INT NULL,
  `imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idimagen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`Peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Peliculas` (
  `idPeliculas` INT NOT NULL auto_increment,
  `Director` VARCHAR(45) NOT NULL,
  `Año` YEAR(4) NOT NULL,
  `Clasificacion` VARCHAR(4) NOT NULL,
  `Pais` VARCHAR(25) NULL,
  `Genero` VARCHAR(20) NULL,
  `Sinposis` TEXT NULL,
  `Precios_idPrecios` INT NOT NULL,
  `imagen_idimagen` INT NOT NULL,
  INDEX `fk_Peliculas_Precios1_idx` (`Precios_idPrecios` ASC),
  PRIMARY KEY (`idPeliculas`),
  INDEX `fk_Peliculas_imagen1_idx` (`imagen_idimagen` ASC),
  CONSTRAINT `fk_Peliculas_Precios1`
    FOREIGN KEY (`Precios_idPrecios`)
    REFERENCES `Cine`.`Precios` (`idPrecios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Peliculas_imagen1`
    FOREIGN KEY (`imagen_idimagen`)
    REFERENCES `Cine`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Cliente` (
  `idcliente` INT NOT NULL auto_increment,
  `Nombre` VARCHAR(30) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(50) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`compras` (
  `idCompra` INT NOT NULL auto_increment,
  `Total` FLOAT NULL,
  `idcliente` INT NOT NULL,
  `cantidad boletos` INT NULL,
  `Fecha` DATE NULL,
  `Cliente_idcliente` INT NOT NULL,
  PRIMARY KEY (`idCompra`, `idcliente`, `Cliente_idcliente`),
  INDEX `fk_compras_Cliente1_idx` (`Cliente_idcliente` ASC),
  CONSTRAINT `fk_compras_Cliente1`
    FOREIGN KEY (`Cliente_idcliente`)
    REFERENCES `Cine`.`Cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
