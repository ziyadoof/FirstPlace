-- Insert for Roles
INSERT INTO `firstplace`.`role` (`Role_ID`, `RoleName`) VALUES ('1', 'Admin');
INSERT INTO `firstplace`.`role` (`Role_ID`, `RoleName`) VALUES ('2', 'Teacher');
INSERT INTO `firstplace`.`role` (`Role_ID`, `RoleName`) VALUES ('3 ', 'Case Worker');

-- Inserts for Rooms
INSERT INTO `firstplace`.`Room` (`Location`) VALUES ('ENGR123');
INSERT INTO `firstplace`.`Room` (`Location`) VALUES ('123');
INSERT INTO `firstplace`.`Room` (`Location`) VALUES ('A45');

-- insert for People
INSERT INTO `firstplace`.`employee` (`emp_id`, `FirstName`, `LastName`, `PhoneNumber`, `email_Address`, `password`, `username`, `Role_Role_ID`) VALUES ('1', 'Tracy', 'Davies', '123', 'tracy@test.com', '123', 'tracydav1', '1');
INSERT INTO `firstplace`.`employee` (`emp_id`, `FirstName`, `LastName`, `PhoneNumber`, `email_Address`, `password`, `username`, `Role_Role_ID`) VALUES ('2', 'Pad', 'Smithq', '34', 'padmini@test.com', '213', 'padsmith', '2');
INSERT INTO `firstplace`.`employee` (`emp_id`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `email_Address`, `password`, `username`, `Role_Role_ID`) VALUES ('3', 'Ziyad', 'Joe', '23123', 'Main St', 'ziyad@test.com', '213', 'ziydajoe', '3');

-- insert for Students
INSERT INTO `firstplace`.`Student` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `YearStarted`) VALUES ('MAry', 'Jane', '123', '123 Main', '2013-05-27');
INSERT INTO `firstplace`.`Student` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `YearStarted`) VALUES ('Joe', 'Smith', '34', 'Tree St', '2013-05-28');
INSERT INTO `firstplace`.`Student` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `YearStarted`) VALUES ('Kenny', 'Von', '32512', 'Pain', '2013-05-29');

-- insert for Specialty
INSERT INTO `firstplace`.`specialty` (`Type`, `Name`) VALUES ('Training', 'Math');
INSERT INTO `firstplace`.`specialty` (`Type`, `Name`) VALUES ('College', 'Chemistry');

-- insert for School Year
INSERT INTO `firstplace`.`schoolyear` (`StartDate`, `EndDate`, `Name`) VALUES ('2010-09-21', '2011-08-10', '2010/2011');
INSERT INTO `firstplace`.`schoolyear` (`StartDate`, `EndDate`, `Name`) VALUES ('2011-09-21', '2012-08-10', '2011/2012');
INSERT INTO `firstplace`.`schoolyear` (`StartDate`, `EndDate`, `Name`) VALUES ('2012-09-21', '2013-08-10', '2012/2013');

-- insert for Holiday
INSERT INTO `firstplace`.`holiday` (`SchoolYear_sy_id`, `StartDate`, `EndDate`, `Name`) VALUES ('1', '2013-05-27', '2013-05-27', 'Memorial Day');
INSERT INTO `firstplace`.`holiday` (`SchoolYear_sy_id`, `StartDate`, `EndDate`, `Name`) VALUES ('1', '2013-06-15', '2013-06-25', 'Summer Break');

-- insert for Attendance Type
INSERT INTO `firstplace`.`attendance_type` (`att_Ty_Name`) VALUES ('Present');
INSERT INTO `firstplace`.`attendance_type` (`att_Ty_Name`) VALUES ('Excused Absence');
INSERT INTO `firstplace`.`attendance_type` (`att_Ty_Name`) VALUES ('Excused Tardy');
INSERT INTO `firstplace`.`attendance_type` (`att_Ty_Name`) VALUES ('Unexcused Absence');
INSERT INTO `firstplace`.`attendance_type` (`att_Ty_Name`) VALUES ('Unexcused Tardy');
