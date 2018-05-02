CREATE TABLE `Darnel-K`.`Contact_Submissions` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `First_Name` VARCHAR(32) NOT NULL,
  `Last_Name` VARCHAR(32) NOT NULL,
  `Email` VARCHAR(254) NOT NULL,
  `Subject` VARCHAR(64) NULL,
  `MSG` TEXT NOT NULL,
  `Slack_Sent` TINYINT NOT NULL DEFAULT 0,
  `Date_Added` DATE NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `CS_Email_FK` (`Email` ASC),
  INDEX `CS_Slack_Sent_FK` (`Slack_Sent` ASC),
  INDEX `CS_Date_Added_FK` (`Date_Added` ASC))
ENGINE = InnoDB
ROW_FORMAT = COMPRESSED;

CREATE TABLE `Darnel-K`.`Users` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `First_Name` VARCHAR(32) NOT NULL,
    `Middle_Name` VARCHAR(64) NOT NULL,
    `Last_Name` VARCHAR(32) NOT NULL
)

CREATE TABLE `Darnel-K`.`Admins` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(16) NOT NULL,
    `First_Name` VARCHAR(32) NOT NULL,
    `Last_Name` VARCHAR(32) NOT NULL,
    `Phone_Number` VARCHAR(20) NOT NULL,
    `Email` VARCHAR(254) NOT NULL,
    `Pass` VARCHAR(256) NOT NULL
)