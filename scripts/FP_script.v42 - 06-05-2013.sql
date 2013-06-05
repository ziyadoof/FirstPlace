SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `FirstPlace` ;
CREATE SCHEMA IF NOT EXISTS `FirstPlace` DEFAULT CHARACTER SET utf8 ;
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
-- Table `FirstPlace`.`Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Role` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Role` (
  `Role_ID` INT NOT NULL AUTO_INCREMENT ,
  `RoleName` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Role_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Employee` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Employee` (
  `emp_id` INT NOT NULL AUTO_INCREMENT ,
  `Room_Room_ID` INT NULL DEFAULT NULL ,
  `FirstName` VARCHAR(45) NOT NULL ,
  `LastName` VARCHAR(45) NOT NULL ,
  `PhoneNumber` INT NULL DEFAULT NULL ,
  `Address` VARCHAR(200) NULL DEFAULT NULL ,
  `email_Address` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `Role_Role_ID` INT NOT NULL ,
  PRIMARY KEY (`emp_id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `fk_Employee_Room1_idx` (`Room_Room_ID` ASC) ,
  INDEX `fk_Employee_Role1_idx` (`Role_Role_ID` ASC) ,
  CONSTRAINT `fk_Employee_Room1`
    FOREIGN KEY (`Room_Room_ID` )
    REFERENCES `FirstPlace`.`Room` (`Room_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_Role1`
    FOREIGN KEY (`Role_Role_ID` )
    REFERENCES `FirstPlace`.`Role` (`Role_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Student` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Student` (
  `s_id` INT NOT NULL AUTO_INCREMENT ,
  `FirstName` VARCHAR(45) NOT NULL ,
  `LastName` VARCHAR(45) NOT NULL ,
  `Grade` VARCHAR(45) NULL DEFAULT NULL ,
  `PhoneNumber` VARCHAR(45) NOT NULL ,
  `Address` VARCHAR(200) NOT NULL ,
  `email_address` VARCHAR(45) NULL DEFAULT NULL ,
  `YearStarted` DATE NULL DEFAULT NULL ,
  `Employee_emp_id` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`s_id`) ,
  INDEX `fk_Student_Employee1_idx` (`Employee_emp_id` ASC) ,
  CONSTRAINT `fk_Student_Employee1`
    FOREIGN KEY (`Employee_emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`SchoolYear`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`SchoolYear` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`SchoolYear` (
  `sy_id` INT NOT NULL AUTO_INCREMENT ,
  `StartDate` DATE NOT NULL ,
  `EndDate` DATE NOT NULL ,
  `Name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`sy_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`StdClass`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`StdClass` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`StdClass` (
  `stdC_id` INT NOT NULL AUTO_INCREMENT ,
  `ClassName` VARCHAR(45) NOT NULL ,
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
  `Name` VARCHAR(45) NULL DEFAULT NULL ,
  `StartTime` TIME NULL DEFAULT NULL ,
  `EndTime` TIME NULL DEFAULT NULL ,
  `Employee_emp_id` INT NOT NULL ,
  PRIMARY KEY (`c_id`) ,
  INDEX `fk_Class_SchoolYear1_idx` (`SchoolYear_sy_id` ASC) ,
  INDEX `fk_Class_Room1_idx` (`Room_Room_ID` ASC) ,
  INDEX `fk_StdClass_id_idx` (`stdC_id` ASC) ,
  INDEX `fk_Class_Employee1_idx` (`Employee_emp_id` ASC) ,
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
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Employee1`
    FOREIGN KEY (`Employee_emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
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
  `Comment` VARCHAR(500) NULL DEFAULT NULL ,
  `Attendance_Student_s_id` INT NOT NULL ,
  `Attendance_Class_ID` INT NOT NULL ,
  INDEX `fk_Attendance_Student1_idx` (`Student_s_id` ASC) ,
  INDEX `c_id_idx` (`Class_ID` ASC) ,
  INDEX `att_Ty_ID_idx` (`att_Ty_ID` ASC) ,
  PRIMARY KEY (`Student_s_id`, `Class_ID`, `Attendance_Student_s_id`, `Attendance_Class_ID`) ,
  INDEX `fk_Attendance_Attendance1_idx` (`Attendance_Student_s_id` ASC, `Attendance_Class_ID` ASC) ,
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
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attendance_Attendance1`
    FOREIGN KEY (`Attendance_Student_s_id` , `Attendance_Class_ID` )
    REFERENCES `FirstPlace`.`Attendance` (`Student_s_id` , `Class_ID` )
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
-- Table `FirstPlace`.`Holiday`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Holiday` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Holiday` (
  `holi_id` INT NOT NULL AUTO_INCREMENT ,
  `SchoolYear_sy_id` INT NOT NULL ,
  `StartDate` DATE NOT NULL ,
  `EndDate` DATE NOT NULL ,
  `Name` VARCHAR(45) NULL DEFAULT NULL ,
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
  PRIMARY KEY (`S_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FirstPlace`.`Employee_has_Specialty`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FirstPlace`.`Employee_has_Specialty` ;

CREATE  TABLE IF NOT EXISTS `FirstPlace`.`Employee_has_Specialty` (
  `Employee_emp_id` INT NOT NULL ,
  `Specialty_S_ID` INT NOT NULL ,
  `SpecStartDate` DATE NOT NULL ,
  `SpecEndDate` DATE NULL ,
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
  `Student_s_id` INT NOT NULL ,
  `Employee_emp_id` INT NOT NULL ,
  `Notf_Date` DATETIME NOT NULL ,
  PRIMARY KEY (`Notf_ID`) ,
  INDEX `att_id_idx` (`Student_s_id` ASC) ,
  INDEX `fk_Notification_Employee1_idx` (`Employee_emp_id` ASC) ,
  CONSTRAINT `fk_Notification_att_id_Student`
    FOREIGN KEY (`Student_s_id` )
    REFERENCES `FirstPlace`.`Attendance` (`Student_s_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notification_Employee1`
    FOREIGN KEY (`Employee_emp_id` )
    REFERENCES `FirstPlace`.`Employee` (`emp_id` )
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
  `old_att_Ty` INT NULL ,
  `new_att_Ty` INT NOT NULL ,
  PRIMARY KEY (`log_ID`) ,
  INDEX `emp_Id_idx` (`emp_id` ASC) ,
  INDEX `log_ty_ID_idx` (`log_type_id` ASC) ,
  INDEX `att_ID_idx` (`att_ID` ASC) ,
  INDEX `fk_Old_Att_ty_ID_idx` (`old_att_Ty` ASC) ,
  INDEX `fk_New_Att_ty_ID_idx` (`new_att_Ty` ASC) ,
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
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Old_Att_ty_ID`
    FOREIGN KEY (`old_att_Ty` )
    REFERENCES `FirstPlace`.`Attendance_type` (`att_Ty_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_New_Att_ty_ID`
    FOREIGN KEY (`new_att_Ty` )
    REFERENCES `FirstPlace`.`Attendance_type` (`att_Ty_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `FirstPlace` ;

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`ViewRooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`ViewRooms` (`Room_ID` INT, `Location` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`EmployeeListWithRoomAndRole_View`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`EmployeeListWithRoomAndRole_View` (`emp_id` INT, `FirstName` INT, `LastName` INT, `email_Address` INT, `username` INT, `password` INT, `Room_Room_ID` INT, `Location` INT, `PhoneNumber` INT, `Address` INT, `Role_Role_ID` INT, `RoleName` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`ViewCaseWorkers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`ViewCaseWorkers` (`emp_id` INT, `firstname` INT, `lastname` INT, `email_address` INT, `username` INT, `password` INT, `room_room_id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`StudentWithCasework`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`StudentWithCasework` (`s_id` INT, `FirstName` INT, `LastName` INT, `Grade` INT, `email_address` INT, `PhoneNumber` INT, `Address` INT, `YearStarted` INT, `Employee_emp_ID` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`ViewStudentHasClass_byClass`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`ViewStudentHasClass_byClass` (`Class_c_id` INT, `Student_s_id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`viewgetteachers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`viewgetteachers` (`emp_id` INT, `firstname` INT, `lastname` INT, `email_address` INT, `username` INT, `password` INT, `room_room_id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`EmployeeHasSpecialties_View`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`EmployeeHasSpecialties_View` (`emp_id` INT, `S_ID` INT, `Type` INT, `Name` INT, `SpecStartDate` INT, `SpecEndDate` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`logEmployee_view`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`logEmployee_view` (`emp_id` INT, `firstname` INT, `lastname` INT, `log_id` INT, `log_Date` INT, `log_ty_id` INT, `log_ty_name` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`ViewClassesInYear`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`ViewClassesInYear` (`c_id` INT, `StartTime` INT, `EndTime` INT, `ClassName` INT, `Name` INT, `StartDate` INT, `EndDate` INT);

-- -----------------------------------------------------
-- Placeholder table for view `FirstPlace`.`logsAtt_view`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirstPlace`.`logsAtt_view` (`emp_id` INT, `emp_firstname` INT, `emp_lastname` INT, `log_id` INT, `log_Date` INT, `old_att_id` INT, `new_att_id` INT, `log_ty_id` INT, `log_ty_name` INT, `st_id` INT, `st_firstname` INT, `st_lastname` INT);

-- -----------------------------------------------------
-- View `FirstPlace`.`ViewRooms`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`ViewRooms` ;
DROP TABLE IF EXISTS `FirstPlace`.`ViewRooms`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`ViewRooms` AS
select * from Room;

-- -----------------------------------------------------
-- View `FirstPlace`.`EmployeeListWithRoomAndRole_View`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`EmployeeListWithRoomAndRole_View` ;
DROP TABLE IF EXISTS `FirstPlace`.`EmployeeListWithRoomAndRole_View`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`EmployeeListWithRoomAndRole_View` AS
SELECT emp_id, FirstName, LastName, email_Address, username, password, Room_Room_ID, Location, PhoneNumber, Address, Role_Role_ID, RoleName
FROM Employee 
left outer join Role on Role_ID = Role_Role_ID
left outer join room 
on Room_Room_ID = Room_ID;

-- -----------------------------------------------------
-- View `FirstPlace`.`ViewCaseWorkers`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`ViewCaseWorkers` ;
DROP TABLE IF EXISTS `FirstPlace`.`ViewCaseWorkers`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`ViewCaseWorkers` AS
    select 
		`e`.`emp_id` AS `emp_id`,
        `e`.`FirstName` AS `firstname`,
        `e`.`LastName` AS `lastname`,
        `e`.`email_Address` AS `email_address`,
        `e`.`username` AS `username`,
        `e`.`password` AS `password`,
        `e`.`Room_Room_ID` AS `room_room_id`
    from
        (`employee` `e`
        join `role` `r`)
    where
        ((`e`.`Role_Role_ID` = `r`.`Role_ID`)
            and (`r`.`RoleName` = 'Case Worker'));

-- -----------------------------------------------------
-- View `FirstPlace`.`StudentWithCasework`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`StudentWithCasework` ;
DROP TABLE IF EXISTS `FirstPlace`.`StudentWithCasework`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`StudentWithCasework` AS
select s.s_id, s.FirstName, s.LastName, s.Grade, s.email_address, s.PhoneNumber, s.Address, s.YearStarted, s.Employee_emp_ID
From Student s left outer join Employee emp
on s.Employee_emp_ID = emp.emp_ID
order by LastName;

-- -----------------------------------------------------
-- View `FirstPlace`.`ViewStudentHasClass_byClass`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`ViewStudentHasClass_byClass` ;
DROP TABLE IF EXISTS `FirstPlace`.`ViewStudentHasClass_byClass`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`ViewStudentHasClass_byClass` AS
select Class_c_id, Student_s_id
From Student_Has_Class right outer join Class 
on Class_c_ID = c_ID;

-- -----------------------------------------------------
-- View `FirstPlace`.`viewgetteachers`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`viewgetteachers` ;
DROP TABLE IF EXISTS `FirstPlace`.`viewgetteachers`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `viewgetteachers` AS
    select 
		`e`.`emp_id` AS `emp_id`,
        `e`.`FirstName` AS `firstname`,
        `e`.`LastName` AS `lastname`,
        `e`.`email_Address` AS `email_address`,
        `e`.`username` AS `username`,
        `e`.`password` AS `password`,
        `e`.`Room_Room_ID` AS `room_room_id`
    from
        (`employee` `e`
        join `role` `r`)
    where
        ((`e`.`Role_Role_ID` = `r`.`Role_ID`)
            and (`r`.`RoleName` = 'teacher'));

-- -----------------------------------------------------
-- View `FirstPlace`.`EmployeeHasSpecialties_View`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`EmployeeHasSpecialties_View` ;
DROP TABLE IF EXISTS `FirstPlace`.`EmployeeHasSpecialties_View`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`EmployeeHasSpecialties_View` AS
SELECT emp_id, S_ID,Type, Name, SpecStartDate, SpecEndDate 
FROM specialty join employee_has_specialty on specialty.S_ID = employee_has_specialty.Specialty_S_ID 
join employee on employee_has_specialty.Employee_emp_id = employee.emp_id;

-- -----------------------------------------------------
-- View `FirstPlace`.`logEmployee_view`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`logEmployee_view` ;
DROP TABLE IF EXISTS `FirstPlace`.`logEmployee_view`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`logEmployee_view` AS
 select 
		`e`.`emp_id` AS `emp_id`,
        `e`.`FirstName` AS `firstname`,
        `e`.`LastName` AS `lastname`,
        `lo`.`log_id` AS `log_id`,
        `lo`.`log_Date` AS `log_Date`,
        `loty`.`log_ty_id` AS `log_ty_id`,
        `loty`.`log_ty_name` AS `log_ty_name`
    from
        `Employee` AS `e`,
        `Logs` AS `lo`,
		`log_Type` AS `loty`
    where
        ((`lo`.`emp_id` = `e`.`emp_id`) AND (`lo`.`log_type_id` = `loty`.`log_ty_id`))
	order by `lo`.`log_Date` DESC;

-- -----------------------------------------------------
-- View `FirstPlace`.`ViewClassesInYear`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`ViewClassesInYear` ;
DROP TABLE IF EXISTS `FirstPlace`.`ViewClassesInYear`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`ViewClassesInYear` AS
SELECT c_id, StartTime, EndTime, ClassName, schoolyear.Name, StartDate, EndDate FROM schoolyear 
JOIN class ON schoolyear.sy_id = class.SchoolYear_sy_id
JOIN stdclass ON class.stdC_id = stdclass.stdC_id;

-- -----------------------------------------------------
-- View `FirstPlace`.`logsAtt_view`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `FirstPlace`.`logsAtt_view` ;
DROP TABLE IF EXISTS `FirstPlace`.`logsAtt_view`;
USE `FirstPlace`;
CREATE  OR REPLACE VIEW `FirstPlace`.`logsAtt_view` AS
 select 
		`e`.`emp_id` AS `emp_id`,
        `e`.`FirstName` AS `emp_firstname`,
        `e`.`LastName` AS `emp_lastname`,
        `lo`.`log_id` AS `log_id`,
        `lo`.`log_Date` AS `log_Date`,
		`lo`.`old_att_Ty` AS `old_att_id`,
		`lo`.`new_att_Ty` AS `new_att_id`,
        `loty`.`log_ty_ID` AS `log_ty_id`,
        `loty`.`log_ty_name` AS `log_ty_name`,
		`s`.`s_id` AS `st_id`,
		`s`.`FirstName` AS `st_firstname`,
		`s`.`LastName` AS `st_lastname`
    from
        `Employee` AS `e`,
        `Logs` AS `lo`,
		`log_Type` AS `loty`,
		`Student` AS `s`
    where
        ((`lo`.`emp_id` = `e`.`emp_id`) AND (`lo`.`log_type_id` = `loty`.`log_ty_id`) 
		AND (`lo`.`att_ID` = `s`.`s_id`))
	order by `lo`.`log_Date` DESC;
USE `FirstPlace`;

DELIMITER $$

USE `FirstPlace`$$
DROP TRIGGER IF EXISTS `FirstPlace`.`Attendance_LogTrig_ADD` $$
USE `FirstPlace`$$


CREATE TRIGGER `Attendance_LogTrig_ADD` AFTER INSERT ON Attendance FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
BEGIN
INSERT INTO Logs (`log_Date`, `emp_id`, `log_type_id`, `att_id`, `new_att_Ty`)
SELECT now(), 1, Log_Type.log_ty_id, new.Student_s_id, new.att_Ty_ID
FROM Log_Type
WHERE Log_Type.log_ty_name = 'Attendence_Add';
END
$$


USE `FirstPlace`$$
DROP TRIGGER IF EXISTS `FirstPlace`.`Attendance_AUPD` $$
USE `FirstPlace`$$


CREATE TRIGGER `Attendance_AUPD` AFTER UPDATE ON Attendance FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
BEGIN
INSERT INTO Logs (`log_Date`, `emp_id`, `log_type_id`, `att_id`, `old_att_Ty`, `new_att_Ty`)
SELECT now(), 1, Log_Type.log_ty_id, new.Student_s_id, old.att_Ty_ID, new.att_Ty_ID
FROM Log_Type
WHERE Log_Type.log_ty_name = 'Attendence_Update';


INSERT INTO Notification (`Student_s_id`, `Employee_emp_id`, `Notf_date`)
SELECT new.Student_s_id, Student.Employee_emp_id, now()
FROM Student
WHERE Student.s_id = Attendance.Student_s_id;
END
$$


DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Room`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Room` (`Room_ID`, `Location`) VALUES (NULL, 'ENGR123');
INSERT INTO `FirstPlace`.`Room` (`Room_ID`, `Location`) VALUES (NULL, 'BANG345');
INSERT INTO `FirstPlace`.`Room` (`Room_ID`, `Location`) VALUES (NULL, 'HIST456');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Role`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Role` (`Role_ID`, `RoleName`) VALUES (NULL, 'Admin');
INSERT INTO `FirstPlace`.`Role` (`Role_ID`, `RoleName`) VALUES (NULL, 'Teacher');
INSERT INTO `FirstPlace`.`Role` (`Role_ID`, `RoleName`) VALUES (NULL, 'Case Worker');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Employee`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Employee` (`emp_id`, `Room_Room_ID`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `email_Address`, `password`, `username`, `Role_Role_ID`) VALUES (NULL, NULL, 'Tracy', 'Davies', 123, NULL, 'tracy@test.com', '123', 'tracydav1', 1);
INSERT INTO `FirstPlace`.`Employee` (`emp_id`, `Room_Room_ID`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `email_Address`, `password`, `username`, `Role_Role_ID`) VALUES (NULL, NULL, 'Padmini', 'Smith', 213, NULL, 'padmini@test.com', '123', 'padsmith', 2);
INSERT INTO `FirstPlace`.`Employee` (`emp_id`, `Room_Room_ID`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `email_Address`, `password`, `username`, `Role_Role_ID`) VALUES (NULL, NULL, 'Ziyad', 'Joe', 23123, 'Main St', 'ziyad@test.com', '123', 'ziyadJo', 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Student` (`s_id`, `FirstName`, `LastName`, `Grade`, `PhoneNumber`, `Address`, `email_address`, `YearStarted`, `Employee_emp_id`) VALUES (NULL, 'Mary ', 'Jane', NULL, '123', 'Main St', '', '2013-05-27', NULL);
INSERT INTO `FirstPlace`.`Student` (`s_id`, `FirstName`, `LastName`, `Grade`, `PhoneNumber`, `Address`, `email_address`, `YearStarted`, `Employee_emp_id`) VALUES (NULL, 'Joe', 'Smith', NULL, '34', 'Tree St', NULL, '2012-06-22', NULL);
INSERT INTO `FirstPlace`.`Student` (`s_id`, `FirstName`, `LastName`, `Grade`, `PhoneNumber`, `Address`, `email_address`, `YearStarted`, `Employee_emp_id`) VALUES (NULL, 'Kenny', 'Von', NULL, '32512', '3rd NW PL', NULL, '2013-05-29', NULL);
INSERT INTO `FirstPlace`.`Student` (`s_id`, `FirstName`, `LastName`, `Grade`, `PhoneNumber`, `Address`, `email_address`, `YearStarted`, `Employee_emp_id`) VALUES (NULL, 'Paul', 'Marten', NULL, '09022', '345 Ninth', 'paul@marten', '2012-04-05', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`SchoolYear`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`SchoolYear` (`sy_id`, `StartDate`, `EndDate`, `Name`) VALUES (NULL, '2010-09-21', '2011-08-10', '2010/2011');
INSERT INTO `FirstPlace`.`SchoolYear` (`sy_id`, `StartDate`, `EndDate`, `Name`) VALUES (NULL, '2011-09-21', '2012-08-10', '2011/2012');
INSERT INTO `FirstPlace`.`SchoolYear` (`sy_id`, `StartDate`, `EndDate`, `Name`) VALUES (NULL, '2012-09-21', '2013-08-10', '2012/2013');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`StdClass`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`StdClass` (`stdC_id`, `ClassName`) VALUES (NULL, 'Math Grade-1');
INSERT INTO `FirstPlace`.`StdClass` (`stdC_id`, `ClassName`) VALUES (NULL, 'Math Grade-2');
INSERT INTO `FirstPlace`.`StdClass` (`stdC_id`, `ClassName`) VALUES (NULL, 'History Grade-6');
INSERT INTO `FirstPlace`.`StdClass` (`stdC_id`, `ClassName`) VALUES (NULL, 'Reading Grade-2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Class` (`c_id`, `SchoolYear_sy_id`, `Room_Room_ID`, `stdC_id`, `Name`, `StartTime`, `EndTime`, `Employee_emp_id`) VALUES (NULL, 3, 1, 1, NULL, '10:00:00', '11:00:00', 2);
INSERT INTO `FirstPlace`.`Class` (`c_id`, `SchoolYear_sy_id`, `Room_Room_ID`, `stdC_id`, `Name`, `StartTime`, `EndTime`, `Employee_emp_id`) VALUES (NULL, 3, 2, 2, NULL, '11:00:00', '12:00:00', 2);
INSERT INTO `FirstPlace`.`Class` (`c_id`, `SchoolYear_sy_id`, `Room_Room_ID`, `stdC_id`, `Name`, `StartTime`, `EndTime`, `Employee_emp_id`) VALUES (NULL, 2, 3, 3, NULL, '13:00:00', '14:00:00', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Attendance_type`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Attendance_type` (`att_Ty_ID`, `att_Ty_Name`) VALUES (NULL, 'Present');
INSERT INTO `FirstPlace`.`Attendance_type` (`att_Ty_ID`, `att_Ty_Name`) VALUES (NULL, 'Escused Absence');
INSERT INTO `FirstPlace`.`Attendance_type` (`att_Ty_ID`, `att_Ty_Name`) VALUES (NULL, 'Excused Tardy');
INSERT INTO `FirstPlace`.`Attendance_type` (`att_Ty_ID`, `att_Ty_Name`) VALUES (NULL, 'Unexcused Absence');
INSERT INTO `FirstPlace`.`Attendance_type` (`att_Ty_ID`, `att_Ty_Name`) VALUES (NULL, 'Unexcused Tardy');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Student_has_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Student_has_Class` (`Student_s_id`, `Class_c_id`) VALUES (1, 1);
INSERT INTO `FirstPlace`.`Student_has_Class` (`Student_s_id`, `Class_c_id`) VALUES (2, 1);
INSERT INTO `FirstPlace`.`Student_has_Class` (`Student_s_id`, `Class_c_id`) VALUES (3, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Holiday`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Holiday` (`holi_id`, `SchoolYear_sy_id`, `StartDate`, `EndDate`, `Name`) VALUES (NULL, 3, '2013-07-04', '2013-07-04', 'July 4th');
INSERT INTO `FirstPlace`.`Holiday` (`holi_id`, `SchoolYear_sy_id`, `StartDate`, `EndDate`, `Name`) VALUES (NULL, 3, '2013-05-27', '2013-05-27', 'Memorial Day');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Specialty`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Specialty` (`S_ID`, `Type`, `Name`) VALUES (NULL, 'Training', 'Math');
INSERT INTO `FirstPlace`.`Specialty` (`S_ID`, `Type`, `Name`) VALUES (NULL, 'BS', 'Chemistry');
INSERT INTO `FirstPlace`.`Specialty` (`S_ID`, `Type`, `Name`) VALUES (NULL, 'BA', 'English');

COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Log_Type`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Log_Type` (`log_ty_ID`, `log_ty_name`) VALUES (1, 'Employee_Add');
INSERT INTO `FirstPlace`.`Log_Type` (`log_ty_ID`, `log_ty_name`) VALUES (2, 'Employee_Update');
INSERT INTO `FirstPlace`.`Log_Type` (`log_ty_ID`, `log_ty_name`) VALUES (NULL, 'Attendance_Add');
INSERT INTO `FirstPlace`.`Log_Type` (`log_ty_ID`, `log_ty_name`) VALUES (NULL, 'Attendance_Update');


COMMIT;

-- -----------------------------------------------------
-- Data for table `FirstPlace`.`Logs`
-- -----------------------------------------------------
START TRANSACTION;
USE `FirstPlace`;
INSERT INTO `FirstPlace`.`Logs` (`log_ID`, `log_Date`, `emp_id`, `log_type_id`, `att_ID`, `old_att_Ty`, `new_att_Ty`) VALUES (NULL, '2013-06-04 15:53:48', 2, 3, 1, NULL, 4);
INSERT INTO `FirstPlace`.`Logs` (`log_ID`, `log_Date`, `emp_id`, `log_type_id`, `att_ID`, `old_att_Ty`, `new_att_Ty`) VALUES (NULL, '2013-06-04 15:33:48', 2, 3, 2, NULL, 4);
INSERT INTO `FirstPlace`.`Logs` (`log_ID`, `log_Date`, `emp_id`, `log_type_id`, `att_ID`, `old_att_Ty`, `new_att_Ty`) VALUES (NULL, '2013-06-04 15:35:48', 2, 4, 2, 3, 4);

COMMIT;
