CREATE TABLE `Darnel-K`.`Contact_Submissions` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `Full_Name` VARCHAR(64) NOT NULL,
    `Email` VARCHAR(254) NOT NULL,
    `Subject` VARCHAR(64) NULL,
    `MSG` TEXT NOT NULL,
    `Slack_Sent` TINYINT NOT NULL DEFAULT 0,
    `Date_Added` DATE NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `CS_Email_I` (`Email` ASC),
    INDEX `CS_Slack_Sent_I` (`Slack_Sent` ASC),
    INDEX `CS_Date_Added_I` (`Date_Added` ASC)
) ENGINE = InnoDB ROW_FORMAT = COMPRESSED;CREATE TABLE `Darnel-K`.`Admin_Logins` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(16) NOT NULL,
    `First_Name` VARCHAR(32) NOT NULL,
    `Last_Name` VARCHAR(32) NOT NULL,
    `Phone_Number` VARCHAR(20) NULL,
    `Email` VARCHAR(254) NOT NULL,
    `Pass` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `AL_Username_I` (`Username` ASC),
    INDEX `AL_Email_I` (`Email` ASC),
    INDEX `AL_Phone_I` (`Phone_Number` ASC)
) ENGINE = InnoDB ROW_FORMAT = COMPRESSED;
