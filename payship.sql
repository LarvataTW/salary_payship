SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `salary_payship` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `salary_payship` ;

-- -----------------------------------------------------
-- Table `salary_payship`.`employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `salary_payship`.`employee` ;

CREATE TABLE IF NOT EXISTS `salary_payship`.`employee` (
  `id` SMALLINT(5) NOT NULL AUTO_INCREMENT COMMENT '資料流水號',
  `eid` SMALLINT NULL COMMENT '記錄員工編號',
  `name` VARCHAR(30) NULL COMMENT '輸入對應欄位：員工名稱\n',
  `email` VARCHAR(45) NULL COMMENT '輸入對應欄位：E-mail',
  `phone` INT(20) NULL COMMENT '輸入對應欄位：電話',
  `address` VARCHAR(45) NULL COMMENT '輸入對應欄位：戶籍地址',
  `basic_salary` INT(10) NULL COMMENT '輸入對應欄位：基本薪資',
  `bank_account` VARCHAR(20) NULL COMMENT '輸入對應欄位：轉帳帳戶',
  `annual_leave` TINYINT(3) NULL COMMENT '輸入對應欄位：年度特休',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
PACK_KEYS = Default;


-- -----------------------------------------------------
-- Table `salary_payship`.`monthly_salary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `salary_payship`.`monthly_salary` ;

CREATE TABLE IF NOT EXISTS `salary_payship`.`monthly_salary` (
  `id` INT(20) NOT NULL AUTO_INCREMENT COMMENT '輸入欄位：無\n說明：流水號',
  `date` DATE NULL COMMENT '輸入欄位：發薪日期',
  `leave` SMALLINT(3) NULL DEFAULT 0 COMMENT '輸入欄位：請假日數',
  `bonus` INT(10) NULL DEFAULT 0 COMMENT '輸入對應欄位：績效獎金',
  `annualbonus` INT(10) NULL DEFAULT 0 COMMENT '輸入對應欄位：年終獎金',
  `subsidy` INT NULL DEFAULT 0 COMMENT '輸入對應欄位：津貼與其它加項',
  `prepaid` INT NULL DEFAULT 0 COMMENT '輸入對應欄位：員工代墊',
  `tax` INT NOT NULL DEFAULT 0 COMMENT '輸入對應欄位：員工名稱\n',
  `laborinsur` INT NOT NULL DEFAULT 0 COMMENT '輸入對應欄位：勞保',
  `healthinsur` INT NOT NULL DEFAULT 0 COMMENT '輸入對應欄位：健保',
  `leavededuct` INT NULL DEFAULT 0 COMMENT '輸入對應欄位：請假扣款',
  `otherdeduct` INT NULL DEFAULT 0 COMMENT '輸入對應欄位：其他扣款',
  `remark` VARCHAR(45) NULL,
  `finalwage` INT NULL,
  `employee_id` SMALLINT(5) NOT NULL COMMENT '對應到流水號 not eid',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `rnid_UNIQUE` (`id` ASC),
  INDEX `fk_monthly_salary_employee_idx` (`employee_id` ASC),
  CONSTRAINT `fk_monthly_salary_employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `salary_payship`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
