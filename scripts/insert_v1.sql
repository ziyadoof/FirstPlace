
-- Inserts for Rooms
INSERT INTO `firstplace`.`Room` (`Location`) VALUES ('ENGR123');
INSERT INTO `firstplace`.`Room` (`Location`) VALUES ('123');
INSERT INTO `firstplace`.`Room` (`Location`) VALUES ('A45');

-- insert for People
INSERT INTO `firstplace`.`Employee` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `email_Address`, `password`, `username`, `employeetype`) VALUES ('Padmino', 'Test', '324342', '2', 'test@test', 'fjkj', 'padCase', 'c');
INSERT INTO `firstplace`.`Employee` (`FirstName`, `LastName`, `email_Address`, `password`, `username`, `employeetype`) VALUES ('Mike', 'tesy', 'test@test', 'sdkas', 'mikeTeach1', 't');
INSERT INTO `firstplace`.`Employee` (`FirstName`, `LastName`, `PhoneNumber`, `email_Address`, `password`, `username`, `employeetype`) VALUES ('Ziyad1', 'Test', '34', 'test2@es', 'sdfTes', 'ZiyadAdmin1', 'a');
INSERT INTO `firstplace`.`Employee` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `email_Address`, `password`, `username`, `employeetype`) VALUES ('Padmino2', 'Test', '324342', '2', 'test@test', 'fjkj', 'padCase2', 'c');
INSERT INTO `firstplace`.`Employee` (`FirstName`, `LastName`, `email_Address`, `password`, `username`, `employeetype`) VALUES ('Mike', 'tesy', 'test@test', 'sdkas', 'mikeTeach2', 't');
INSERT INTO `firstplace`.`Employee` (`FirstName`, `LastName`, `PhoneNumber`, `email_Address`, `password`, `username`, `employeetype`) VALUES ('Ziyad2', 'Test', '34', 'test2@es', 'sdfTes', 'ZiyadAdmin2', 'a');

-- insert for Students
INSERT INTO `firstplace`.`Student` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `YearStarted`) VALUES ('MAry', 'Jane', '123', '123 Main', 'CURDATE()');
INSERT INTO `firstplace`.`Student` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `YearStarted`) VALUES ('Joe', 'Smith', '34', 'Tree St', 'CURDATE()');
INSERT INTO `firstplace`.`Student` (`FirstName`, `LastName`, `PhoneNumber`, `Address`, `YearStarted`) VALUES ('Kenny', 'Von', '32512', 'Pain', 'CURDATE()');

select * from Employees;


