DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `DeleteAppointmentData`(IN inAppId INT)
BEGIN
DELETE FROM appointments WHERE appointmentId = inAppId;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `DeleteDeadlineData`(IN inDeadlineId INT)
BEGIN
DELETE FROM deadlines WHERE deadlineId = inDeadlineId;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `GetAppointmentData`(IN inUserId INT)
BEGIN
SELECT * from appointments WHERE userId = inUserId;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `GetDeadlineData`(IN inUserId INT)
BEGIN
SELECT * from deadlines WHERE userId = inUserId;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `GetUserData`(IN inUserId INT)
BEGIN
SELECT * FROM users WHERE userId = inUserId;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `GetUserId`(IN inFirstName VARCHAR(30))
BEGIN
SELECT userId FROM users WHERE firstName = inFirstName;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `SetAppointmentData`(IN inUserId INT, IN inAppDT DATETIME, IN inAppNotes VARCHAR(255), IN inAppDesc VARCHAR(255))
BEGIN
INSERT INTO appointments (userId, appDT, appNotes, appDesc)
VALUES (inUserId, inAppDT, inAppNotes, inAppDesc);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `SetDeadlineData`(IN inUserId INT, IN inDeadlineDT DATETIME, IN inDeadlineDesc VARCHAR(255), IN inDeadlineCheck VARCHAR(5))
BEGIN
INSERT INTO deadlines (userId, deadlineDT, deadlineDesc, deadlineCheck)
VALUES (inUserId, inDeadlineDT, inDeadlineDesc, inDeadlineCheck);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `UpdateAppointmentData`(IN inAppId INT, IN inAppDT DATETIME, IN inAppNotes VARCHAR(255), IN inAppDesc VARCHAR(255) )
BEGIN
UPDATE appointments
SET appDT = inAppDT , appNotes = inAppNotes, appDesc = inAppDesc 
WHERE appointmentId = inAppID;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`ISAD251_CBlairRains`@`%` PROCEDURE `UpdateDeadlineData`(IN inDeadlineId INT, IN inDeadlineDT DATETIME, IN inDeadlineDesc VARCHAR(255), IN inDeadlineCheck VARCHAR(255))
BEGIN
UPDATE deadlines
SET deadlineDT = inDeadlineDT, deadlineDesc = inDeadlineDesc, deadlineCheck = inDeadlineCheck
WHERE deadlineId = inDeadlineId;
END$$
DELIMITER ;
