SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `FirstPlace` ;
CREATE SCHEMA IF NOT EXISTS `FirstPlace` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `FirstPlace` ;

-- -----------------------------------------------------
-- Table `FirstPlace`.`Room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Room` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Room` (
  `Room_ID` INT NOT NULL AUTO_INCREMENT ,
  `Location` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Room_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Employee` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Employee` (
  `emp_id` INT NOT NULL AUTO_INCREMENT ,
  `Room_Room_ID` INT NULL ,
  `FirstName` VARCHAR(45) NOT NULL ,
  `LastName` VARCHAR(45) NOT NULL ,
  `PhoneNumber` INT NULL ,
  `Address` VARCHAR(200) NULL ,
  `email_Address` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `employeetype` VARCHAR(5) NOT NULL ,
  PRIMARY KEY (`emp_id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `fk_Employee_Room1_idx` (`Room_Room_ID` ASC) ,
  CONSTRAINT `fk_Employee_Room1`
    FOREIGN KEY (`Room_Room_ID` )
    REFERENCES `FirstPlace`.`Room` (`Room_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Case_Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Case_Role` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Case_Role` (
  `CaseWorker_ID` INT NOT NULL ,
  `Employee_emp_id` INT NOT NULL ,
  PRIMARY KEY (`CaseWorker_ID`, `Employee_emp_id`) ,
  INDEX `fk_Case_Role_Employee1_idx` (`Employee_emp_id` ASC) ,
  CONSTRAINT `fk_Case_Role_Employee1`
    FOREIGN KEY (`Employee_emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Student` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Student` (
  `s_id` INT NOT NULL AUTO_INCREMENT ,
  `Case_Role_CaseWorker_ID` INT NULL ,
  `FirstName` VARCHAR(45) NOT NULL ,
  `LastName` VARCHAR(45) NOT NULL ,
  `Grade` VARCHAR(45) NULL ,
  `PhoneNumber` VARCHAR(45) NOT NULL ,
  `Address` VARCHAR(200) NOT NULL ,
  `email_address` VARCHAR(45) NULL ,
  `YearStarted` DATETIME NOT NULL ,
  PRIMARY KEY (`s_id`) ,
  INDEX `fk_Student_Case_Role1_idx` (`Case_Role_CaseWorker_ID` ASC) ,
  CONSTRAINT `fk_Student_Case_Role1`
    FOREIGN KEY (`Case_Role_CaseWorker_ID` )
    REFERENCES `FirstPlace`.`Case_Role` (`CaseWorker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`SchoolYear`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`SchoolYear` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`SchoolYear` (
  `sy_id` INT NOT NULL AUTO_INCREMENT ,
  `StartDate` VARCHAR(45) NOT NULL ,
  `EndDate` VARCHAR(45) NOT NULL ,
  `Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`sy_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`StdClass`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`StdClass` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`StdClass` (
  `stdC_id` INT NOT NULL AUTO_INCREMENT ,
  `ClassName` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`stdC_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Class` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Class` (
  `c_id` INT NOT NULL AUTO_INCREMENT ,
  `SchoolYear_sy_id` INT NOT NULL ,
  `Room_Room_ID` INT NOT NULL ,
  `stdC_id` INT NOT NULL ,
  `Name` VARCHAR(45) NOT NULL ,
  `StartTime` VARCHAR(45) NULL ,
  `EndTime` VARCHAR(45) NULL ,
  PRIMARY KEY (`c_id`) ,
  INDEX `fk_Class_SchoolYear1_idx` (`SchoolYear_sy_id` ASC) ,
  INDEX `fk_Class_Room1_idx` (`Room_Room_ID` ASC) ,
  INDEX `fk_StdClass_id_idx` (`stdC_id` ASC) ,
  CONSTRAINT `fk_Class_SchoolYear1`
    FOREIGN KEY (`SchoolYear_sy_id` )
    REFERENCES `FirstPlace`.`SchoolYear` (`sy_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Room1`
    FOREIGN KEY (`Room_Room_ID` )
    REFERENCES `FirstPlace`.`Room` (`Room_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_StdClass_id_StdClass`
    FOREIGN KEY (`stdC_id` )
    REFERENCES `FirstPlace`.`StdClass` (`stdC_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Attendance_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Attendance_type` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Attendance_type` (
  `att_Ty_ID` INT NOT NULL AUTO_INCREMENT ,
  `att_Ty_Name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`att_Ty_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Attendance` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Attendance` (
  `Student_s_id` INT NOT NULL ,
  `Class_ID` INT NOT NULL ,
  `att_Ty_ID` INT NOT NULL ,
  `Att_Date` DATE NOT NULL ,
  `Comment` VARCHAR(500) NULL ,
  INDEX `fk_Attendance_Student1_idx` (`Student_s_id` ASC) ,
  INDEX `c_id_idx` (`Class_ID` ASC) ,
  INDEX `att_Ty_ID_idx` (`att_Ty_ID` ASC) ,
  PRIMARY KEY (`Student_s_id`, `Class_ID`) ,
  CONSTRAINT `fk_Attendance_c_id_Class`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `FirstPlace`.`Class` (`c_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attendance_Student1`
    FOREIGN KEY (`Student_s_id` )
    REFERENCES `FirstPlace`.`Student` (`s_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attendance_att_Ty_D_AttendanceType`
    FOREIGN KEY (`att_Ty_ID` )
    REFERENCES `FirstPlace`.`Attendance_type` (`att_Ty_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Student_has_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Student_has_Class` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Student_has_Class` (
  `Student_s_id` INT NOT NULL ,
  `Class_c_id` INT NOT NULL ,
  PRIMARY KEY (`Student_s_id`, `Class_c_id`) ,
  INDEX `fk_Student_has_Class_Class1_idx` (`Class_c_id` ASC) ,
  INDEX `fk_Student_has_Class_Student_idx` (`Student_s_id` ASC) ,
  CONSTRAINT `fk_Student_has_Class_Student`
    FOREIGN KEY (`Student_s_id` )
    REFERENCES `FirstPlace`.`Student` (`s_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_has_Class_Class1`
    FOREIGN KEY (`Class_c_id` )
    REFERENCES `FirstPlace`.`Class` (`c_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Teacher_Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Teacher_Role` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Teacher_Role` (
  `Tech_ID` INT NOT NULL ,
  `Employee_emp_id` INT NOT NULL ,
  PRIMARY KEY (`Tech_ID`, `Employee_emp_id`) ,
  INDEX `fk_Teacher_Role_Employee1_idx` (`Employee_emp_id` ASC) ,
  CONSTRAINT `fk_Teacher_Role_Employee1`
    FOREIGN KEY (`Employee_emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Holiday`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Holiday` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Holiday` (
  `holi_id` INT NOT NULL AUTO_INCREMENT ,
  `SchoolYear_sy_id` INT NOT NULL ,
  `Start Date` VARCHAR(45) NOT NULL ,
  `EndDate` VARCHAR(45) NOT NULL ,
  `Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`holi_id`) ,
  INDEX `fk_Holiday_SchoolYear1_idx` (`SchoolYear_sy_id` ASC) ,
  CONSTRAINT `fk_Holiday_SchoolYear1`
    FOREIGN KEY (`SchoolYear_sy_id` )
    REFERENCES `FirstPlace`.`SchoolYear` (`sy_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Specialty`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Specialty` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Specialty` (
  `S_ID` INT NOT NULL AUTO_INCREMENT ,
  `Type` VARCHAR(45) NOT NULL ,
  `Name` VARCHAR(45) NOT NULL ,
  `Start_Date` DATE NOT NULL ,
  `End_Date` DATE NOT NULL ,
  PRIMARY KEY (`S_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Employee_has_Specialty`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Employee_has_Specialty` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Employee_has_Specialty` (
  `Employee_emp_id` INT NOT NULL ,
  `Specialty_S_ID` INT NOT NULL ,
  PRIMARY KEY (`Specialty_S_ID`, `Employee_emp_id`) ,
  INDEX `fk_Employee_has_Specialty_Specialty1_idx` (`Specialty_S_ID` ASC) ,
  INDEX `fk_Employee_has_Specialty_Employee1_idx` (`Employee_emp_id` ASC) ,
  CONSTRAINT `fk_Employee_has_Specialty_Employee1`
    FOREIGN KEY (`Employee_emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_has_Specialty_Specialty1`
    FOREIGN KEY (`Specialty_S_ID` )
    REFERENCES `FirstPlace`.`Specialty` (`S_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Notification`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Notification` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Notification` (
  `Notf_ID` INT NOT NULL AUTO_INCREMENT ,
  `Case_Role_CaseWorker_ID` INT NOT NULL ,
  `Student_s_id` INT NOT NULL ,
  `Notf_Date` DATE NOT NULL ,
  PRIMARY KEY (`Notf_ID`) ,
  INDEX `fk_Notification_Case_Role1_idx` (`Case_Role_CaseWorker_ID` ASC) ,
  INDEX `att_id_idx` (`Student_s_id` ASC) ,
  CONSTRAINT `fk_Notification_Case_Role1`
    FOREIGN KEY (`Case_Role_CaseWorker_ID` )
    REFERENCES `FirstPlace`.`Case_Role` (`CaseWorker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notification_att_id_Student`
    FOREIGN KEY (`Student_s_id` )
    REFERENCES `FirstPlace`.`Attendance` (`Student_s_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Admin_Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Admin_Role` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Admin_Role` (
  `Admin_ID` INT NOT NULL ,
  `emp_id` INT NOT NULL ,
  PRIMARY KEY (`Admin_ID`, `emp_id`) ,
  INDEX `Employee_emp_Id_idx` (`emp_id` ASC) ,
  CONSTRAINT `Employee_emp_id`
    FOREIGN KEY (`emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Teacher_Role_has_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Teacher_Role_has_Class` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Teacher_Role_has_Class` (
  `Teacher_Role_Tech_ID` INT NOT NULL ,
  `Class_c_id` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Role_Tech_ID`, `Class_c_id`) ,
  INDEX `fk_Teacher_Role_has_Class_Class1_idx` (`Class_c_id` ASC) ,
  INDEX `fk_Teacher_Role_has_Class_Teacher_Role1_idx` (`Teacher_Role_Tech_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Role_has_Class_Teacher_Role1`
    FOREIGN KEY (`Teacher_Role_Tech_ID` )
    REFERENCES `FirstPlace`.`Teacher_Role` (`Tech_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Role_has_Class_Class1`
    FOREIGN KEY (`Class_c_id` )
    REFERENCES `FirstPlace`.`Class` (`c_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Log_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Log_Type` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Log_Type` (
  `log_ty_ID` INT NOT NULL AUTO_INCREMENT ,
  `log_ty_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`log_ty_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Logs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Logs` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Logs` (
  `log_ID` INT NOT NULL AUTO_INCREMENT ,
  `log_Date` DATETIME NOT NULL ,
  `emp_id` INT NOT NULL ,
  `log_type_id` INT NOT NULL ,
  `att_ID` INT NOT NULL ,
  PRIMARY KEY (`log_ID`) ,
  INDEX `emp_Id_idx` (`emp_id` ASC) ,
  INDEX `log_ty_ID_idx` (`log_type_id` ASC) ,
  INDEX `att_ID_idx` (`att_ID` ASC) ,
  CONSTRAINT `fk_Logs_emp_Id_Employee`
    FOREIGN KEY (`emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Logs_log_ty_ID_LogType`
    FOREIGN KEY (`log_type_id` )
    REFERENCES `FirstPlace`.`Log_Type` (`log_ty_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Logs_att_ID_Attendance`
    FOREIGN KEY (`att_ID` )
    REFERENCES `FirstPlace`.`Attendance` (`Student_s_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `FirstPlace` ;

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`ViewRooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`ViewRooms` (`Room_ID` INT, `Location` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`EmployeeListWithRoom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`EmployeeListWithRoom` (`emp_id` INT, `FirstName` INT, `LastName` INT, `email_Address` INT, `username` INT, `password` INT, `Location` INT, `PhoneNumber` INT, `Address` INT, `employeetype` INT);

-- -----------------------------------------------------
-- View `FirstPlace`.`ViewRooms`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`ViewRooms` ;
DROP TABLE IF EXISTS `FirstPlace`.`ViewRooms`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`ViewRooms` AS
select * from Room;

-- -----------------------------------------------------
-- View `FirstPlace`.`EmployeeListWithRoom`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`EmployeeListWithRoom` ;
DROP TABLE IF EXISTS `FirstPlace`.`EmployeeListWithRoom`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`EmployeeListWithRoom` AS
select emp_id, FirstName, LastName, email_Address, username, password, Location, PhoneNumber, Address, employeetype
From Employee left outer join room 
on Room_Room_ID = Room_ID;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
