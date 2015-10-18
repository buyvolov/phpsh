SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `hash` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`currency`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`currency` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`account` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `amount` FLOAT NULL,
  `user_id` INT NOT NULL,
  `currency_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`, `currency_id`),
  INDEX `fk_account_user_idx` (`user_id` ASC),
  INDEX `fk_account_currency1_idx` (`currency_id` ASC),
  CONSTRAINT `fk_account_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_account_currency1`
    FOREIGN KEY (`currency_id`)
    REFERENCES `mydb`.`currency` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`transaction` (
  `id` INT NOT NULL,
  `price` FLOAT NULL,
  `incoming_account_id` INT NOT NULL,
  `outgoing_account_id` INT NOT NULL,
  PRIMARY KEY (`incoming_account_id`, `id`, `outgoing_account_id`),
  INDEX `fk_transaction_account1_idx` (`incoming_account_id` ASC),
  INDEX `fk_transaction_account2_idx` (`outgoing_account_id` ASC),
  CONSTRAINT `fk_transaction_account1`
    FOREIGN KEY (`incoming_account_id`)
    REFERENCES `mydb`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_account2`
    FOREIGN KEY (`outgoing_account_id`)
    REFERENCES `mydb`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
