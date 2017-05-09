-- MySQL Script generated by MySQL Workbench
-- Seg 08 Mai 2017 09:37:42 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema show_do_milhao
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema show_do_milhao
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `show_do_milhao` DEFAULT CHARACTER SET utf8 ;
USE `show_do_milhao` ;

-- -----------------------------------------------------
-- Table `show_do_milhao`.`Professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Professor` (
  `idProfessor` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(200) NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `Email` VARCHAR(150) NOT NULL,
  `Curriculo` VARCHAR(150) NOT NULL,
  `Instituicao` VARCHAR(150) NOT NULL,
  `Titulacao` VARCHAR(150) NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProfessor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Assunto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Assunto` (
  `idAssunto` INT NOT NULL AUTO_INCREMENT,
  `Descricao_Assunto` VARCHAR(150) NULL,
  PRIMARY KEY (`idAssunto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Curso` (
  `idCurso` INT NOT NULL AUTO_INCREMENT,
  `Descricao_Curso` VARCHAR(150) NULL,
  PRIMARY KEY (`idCurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Disciplina` (
  `idDisciplina` INT NOT NULL AUTO_INCREMENT,
  `Descricao_Disciplina` VARCHAR(150) NULL,
  PRIMARY KEY (`idDisciplina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Jogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Jogo` (
  `idJogo` INT NOT NULL AUTO_INCREMENT,
  `Professor_idProfessor` INT NOT NULL,
  `Assunto_idAssunto` INT NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  `Disciplina_idDisciplina` INT NOT NULL,
  PRIMARY KEY (`idJogo`),
  INDEX `fk_Jogo_Professor1_idx` (`Professor_idProfessor` ASC),
  INDEX `fk_Jogo_Assunto1_idx` (`Assunto_idAssunto` ASC),
  INDEX `fk_Jogo_Curso1_idx` (`Curso_idCurso` ASC),
  INDEX `fk_Jogo_Disciplina1_idx` (`Disciplina_idDisciplina` ASC),
  CONSTRAINT `fk_Jogo_Professor1`
    FOREIGN KEY (`Professor_idProfessor`)
    REFERENCES `show_do_milhao`.`Professor` (`idProfessor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jogo_Assunto1`
    FOREIGN KEY (`Assunto_idAssunto`)
    REFERENCES `show_do_milhao`.`Assunto` (`idAssunto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jogo_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `show_do_milhao`.`Curso` (`idCurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jogo_Disciplina1`
    FOREIGN KEY (`Disciplina_idDisciplina`)
    REFERENCES `show_do_milhao`.`Disciplina` (`idDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Jogador` (
  `idJogador` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(200) NOT NULL,
  `Instituicao` VARCHAR(150) NOT NULL,
  `Equipe` VARCHAR(100) NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `Email` VARCHAR(150) NOT NULL,
  `Senha` VARCHAR(45) NULL,
  PRIMARY KEY (`idJogador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Partida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Partida` (
  `idPartida` INT NOT NULL AUTO_INCREMENT,
  `Data` DATE NOT NULL,
  `Hora` TIME NOT NULL,
  `Duracao` INT NULL,
  `Jogo_idJogo` INT NOT NULL,
  `Jogador_idJogador` INT NOT NULL,
  `Pontuacao` FLOAT NOT NULL,
  PRIMARY KEY (`idPartida`),
  INDEX `fk_Partida_Jogo_idx` (`Jogo_idJogo` ASC),
  INDEX `fk_Partida_Jogador1_idx` (`Jogador_idJogador` ASC),
  CONSTRAINT `fk_Partida_Jogo`
    FOREIGN KEY (`Jogo_idJogo`)
    REFERENCES `show_do_milhao`.`Jogo` (`idJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Partida_Jogador1`
    FOREIGN KEY (`Jogador_idJogador`)
    REFERENCES `show_do_milhao`.`Jogador` (`idJogador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Perguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Perguntas` (
  `idPerguntas` INT NOT NULL AUTO_INCREMENT,
  `Enunciado` VARCHAR(200) NOT NULL,
  `Respostas` VARCHAR(200) NOT NULL,
  `Jogo_idJogo` INT NOT NULL,
  PRIMARY KEY (`idPerguntas`),
  INDEX `fk_Perguntas_Jogo1_idx` (`Jogo_idJogo` ASC),
  CONSTRAINT `fk_Perguntas_Jogo1`
    FOREIGN KEY (`Jogo_idJogo`)
    REFERENCES `show_do_milhao`.`Jogo` (`idJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Ajudas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Ajudas` (
  `idAjudas` INT NOT NULL AUTO_INCREMENT,
  `Universitarios` VARCHAR(45) NULL,
  `Cartas` VARCHAR(45) NULL,
  `Pulo` VARCHAR(45) NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  PRIMARY KEY (`idAjudas`),
  INDEX `fk_Ajudas_Perguntas1_idx` (`Perguntas_idPerguntas` ASC),
  CONSTRAINT `fk_Ajudas_Perguntas1`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `show_do_milhao`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `show_do_milhao`.`Alternativas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `show_do_milhao`.`Alternativas` (
  `idAlternativas` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(200) NOT NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  PRIMARY KEY (`idAlternativas`),
  INDEX `fk_Alternativas_Perguntas1_idx` (`Perguntas_idPerguntas` ASC),
  CONSTRAINT `fk_Alternativas_Perguntas1`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `show_do_milhao`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

 