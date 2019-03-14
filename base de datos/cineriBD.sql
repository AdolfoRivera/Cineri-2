-- MySQL Workbench Forward Engineering

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
-- Table `Cine`.`Ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Ventas` (
  `idVentas` INT NOT NULL,
  `Total` FLOAT NULL,
  `idcliente` INT NULL,
  `cantidad boletos` INT NULL,
  `Fecha` DATE NULL,
  PRIMARY KEY (`idVentas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`Precios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Precios` (
  `idPrecios` INT NOT NULL,
  `idPeliculas` INT NULL,
  `Tradicional` FLOAT NULL,
  `3D` FLOAT NULL,
  `Ventas_idVentas` INT NOT NULL,
  PRIMARY KEY (`idPrecios`),
  INDEX `fk_Precios_Ventas1_idx` (`Ventas_idVentas` ASC),
  CONSTRAINT `fk_Precios_Ventas1`
    FOREIGN KEY (`Ventas_idVentas`)
    REFERENCES `Cine`.`Ventas` (`idVentas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`imagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`imagen` (
  `idimagen` INT NOT NULL,
  `idPeliculas` INT NULL,
  `imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idimagen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`Peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Peliculas` (
  `idPeliculas` INT NOT NULL,
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
-- Table `Cine`.`CuentaCliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`CuentaCliente` (
  `idCuentaCliente` INT NOT NULL,
  `Correo` VARCHAR(40) NULL,
  `Contraseña` VARCHAR(40) NULL,
  PRIMARY KEY (`idCuentaCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cine`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cine`.`Cliente` (
  `idcliente` INT NOT NULL,
  `Nombre` VARCHAR(30) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `idCuentaCliente` INT NOT NULL,
  `CuentaCliente_idCuentaCliente` INT NOT NULL,
  `Ventas_idVentas` INT NOT NULL,
  INDEX `fk_cliente_CuentaCliente_idx` (`CuentaCliente_idCuentaCliente` ASC),
  INDEX `fk_Cliente_Ventas1_idx` (`Ventas_idVentas` ASC),
  PRIMARY KEY (`idcliente`),
  CONSTRAINT `fk_cliente_CuentaCliente`
    FOREIGN KEY (`CuentaCliente_idCuentaCliente`)
    REFERENCES `Cine`.`CuentaCliente` (`idCuentaCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cliente_Ventas1`
    FOREIGN KEY (`Ventas_idVentas`)
    REFERENCES `Cine`.`Ventas` (`idVentas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
